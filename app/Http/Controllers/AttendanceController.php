<?php

namespace App\Http\Controllers;

use App\Mail\LeaveMail;
use App\Mail\TimeOutMail;
use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Employee::with([
                'attendance' => function ($query) {
                    $query->whereDate('created_at', Carbon::today());
                }
            ])->get();

            return DataTables::of($data)->make(true);
        }

        return view('attendance.index');
    }

    public function inn($id)
    {
        $pakistanTime = Carbon::now()->setTimezone('Asia/Karachi')->format('h:i A');

        $startAllowedTime = Carbon::createFromFormat('h:i A', '10:00 AM', 'Asia/Karachi');
        $endAllowedTime = Carbon::createFromFormat('h:i A', '07:00 PM', 'Asia/Karachi');

        if ($pakistanTime < $startAllowedTime || $pakistanTime > $endAllowedTime) {
            return redirect()->back()->with('error', 'Attendance can only be marked between 10 AM and 7 PM.');
        }

        $existingAttendance = Attendance::where('user_id', $id)
            ->whereDate('created_at', Carbon::today('Asia/Karachi'))
            ->first();
        if ($existingAttendance) {
            return redirect()->back()->with('error', 'Attendance for today has already been marked.');
        }
        $attendance = new Attendance;
        $attendance->user_id = $id;
        $attendance->inn_time = $pakistanTime;

        $innTimeCarbon = Carbon::createFromFormat('h:i A', $attendance->inn_time, 'Asia/Karachi');
        $limitTime = Carbon::createFromFormat('h:i A', '10:00 AM', 'Asia/Karachi');
        $extraLimitTime = Carbon::createFromFormat('h:i A', '11:00 AM', 'Asia/Karachi');
        $tooLateTime = Carbon::createFromFormat('h:i A', '12:00 PM', 'Asia/Karachi');

        if ($innTimeCarbon >= $tooLateTime) {
            $attendance->status = "Too Late";
        } elseif ($innTimeCarbon >= $extraLimitTime) {
            $attendance->status = "Late";
        } else {
            $attendance->status = "Acceptable";
        }
        $attendance->save();
        return redirect()->back()->with('success', 'Attendance Updated');
    }


    public function out($id)
    {
        $pakistanTime = Carbon::now()->setTimezone('Asia/Karachi')->format('h:i A');
        $employee = Employee::where('id', $id)->first();
        $attendance = Attendance::where('user_id', $id)
            ->whereDate('created_at', Carbon::today('Asia/Karachi'))
            ->first();

        if (!$attendance) {
            return redirect()->back()->with('error', 'Attendance not found for today.');
        }

        if ($attendance->out_time) {
            return redirect()->back()->with('error', 'Attendance has already been marked out.');
        }

        $attendance->out_time = $pakistanTime;

        if (!$attendance->inn_time) {
            return redirect()->back()->with('error', 'You must mark attendance in before marking out.');
        }

        $innTime = Carbon::createFromFormat('h:i A', $attendance->inn_time, 'Asia/Karachi');
        $outTime = Carbon::createFromFormat('h:i A', $pakistanTime, 'Asia/Karachi');

        if ($outTime < $innTime) {
            return redirect()->back()->with('error', 'Out time cannot be earlier than In time.');
        }

        $hoursDifference = $innTime->diff($outTime);
        $totalHours = $hoursDifference->format('%H:%I');

        $attendance->hours = $totalHours;

        $attendance->save();

        Mail::to($employee->email)->send(new TimeOutMail($employee->full_name, $attendance->inn_time, $attendance->out_time, $attendance->hours));
        return redirect()->back()->with('success', 'Attendance Updated');
    }


    // public function wfh($id)
    // {
    //     $pakistanTime = Carbon::now()->setTimezone('Asia/Karachi')->format('h:i A');

    //     $existingAttendance = Attendance::where('user_id', $id)
    //         ->whereDate('created_at', Carbon::today('Asia/Karachi'))
    //         ->first();
    //     if ($existingAttendance) {
    //         return redirect()->back()->with('error', 'Attendance for today has already been marked.');
    //     }
    //     $attendance = new Attendance;
    //     $attendance->user_id = $id;
    //     $attendance->inn_time = $pakistanTime;
    //     $attendance->save();
    //     return redirect()->back()->with('success', 'Work from Home status updated');
    // }

    public function leave($id)
    {
        $pakistanTime = Carbon::now()->setTimezone('Asia/Karachi')->format('h:i A');
        $startAllowedTime = Carbon::createFromFormat('h:i A', '10:00 AM', 'Asia/Karachi');
        $endAllowedTime = Carbon::createFromFormat('h:i A', '07:00 PM', 'Asia/Karachi');

        $employee = Employee::where('id', $id)->first();
        $attendance = Attendance::where('user_id', $id)
            ->whereDate('created_at', Carbon::today('Asia/Karachi'))
            ->first();

        if ($attendance) {
            return redirect()->back()->with('error', 'Attendance has already been marked');
        }

        if ($pakistanTime < $startAllowedTime || $pakistanTime > $endAllowedTime) {
            return redirect()->back()->with('error', 'Attendance can only be marked between 10 AM and 7 PM.');
        }

        $attendance = new Attendance;
        $attendance->user_id = $id;
        $attendance->status = 'Leave';
        $attendance->save();
        Mail::to($employee->email)->send(new LeaveMail($employee->full_name, $attendance->created_at));
        return redirect()->back()->with('success', 'Leave status updated');
    }

}

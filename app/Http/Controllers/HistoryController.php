<?php

namespace App\Http\Controllers;

use App\Mail\FineMail;
use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class HistoryController extends Controller
{
    public function index()
    {
        return view('history.history');
    }

    public function history($slug)
    {
        $employee = Employee::where('slug', $slug)->first();

        if (!$employee) {
            return response()->json(['error' => 'Employee not found'], 404);
        }

        $currentMonth = now()->month;
        $currentYear = now()->year;

        $attendance = Attendance::where('user_id', $employee->id)
            ->whereYear('created_at', $currentYear)
            ->whereMonth('created_at', $currentMonth)
            ->get();

        $daysInMonth = now('Asia/Karachi')->daysInMonth;
        $fullMonthAttendance = [];

        for ($day = 1; $day <= $daysInMonth; $day++) {
            $date = "{$currentYear}-{$currentMonth}-" . str_pad($day, 2, '0', STR_PAD_LEFT);

            $attendanceForDay = $attendance->firstWhere(function ($att) use ($date) {
                return $att->created_at->format('Y-m-d') === $date;
            });

            if ($attendanceForDay) {
                $status = $attendanceForDay->status;
                $badgeClass = '';

                if ($status == 'Acceptable') {
                    $badgeClass = 'badge-success';
                } elseif ($status == 'Late') {
                    $badgeClass = 'badge-danger';
                } elseif ($status == 'Too Late') {
                    $badgeClass = 'badge-warning';
                } elseif ($status == 'Leave') {
                    $badgeClass = 'badge-danger';
                }

                $fullMonthAttendance[] = [
                    'day' => $day,
                    'attendance' => $status,
                    'badgeClass' => $badgeClass,
                    'inn_time' => $attendanceForDay->inn_time,
                    'out_time' => $attendanceForDay->out_time,
                    'hours' => $attendanceForDay->hours
                ];
            } else {
                $fullMonthAttendance[] = [
                    'day' => $day,
                    'attendance' => '',
                    'badgeClass' => '',
                    'inn_time' => '',
                    'out_time' => '',
                    'hours' => ''
                ];
            }
        }

        return view('history.attendance_history', compact('employee', 'fullMonthAttendance'));
    }

    public function fine($slug)
    {
        $employee = Employee::where('slug', $slug)->first();

        if (!$employee) {
            return response()->json(['error' => 'Employee not found'], 404);
        }

        $currentMonth = now()->month;
        $currentYear = now()->year;

        $attendance = Attendance::where('user_id', $employee->id)
            ->whereYear('created_at', $currentYear)
            ->whereMonth('created_at', $currentMonth)
            ->get();

        $daysInMonth = now('Asia/Karachi')->daysInMonth;
        $totalFine = 0;
        $workingHours = 9;

        for ($day = 1; $day <= $daysInMonth; $day++) {
            $date = "{$currentYear}-{$currentMonth}-" . str_pad($day, 2, '0', STR_PAD_LEFT);

            $attendanceForDay = $attendance->firstWhere(function ($att) use ($date) {
                return $att->created_at->format('Y-m-d') === $date;
            });

            if ($attendanceForDay) {
                $status = $attendanceForDay->status;
                $fineForDay = 0;

                if ($status == 'Acceptable' || $status == 'Late' || $status == 'Too Late') {
                    if ($attendanceForDay->hours) {
                        $workedHours = $this->calculateWorkedHours($attendanceForDay->inn_time, $attendanceForDay->out_time);
                        if ($workedHours < $workingHours) {
                            $fineForDay = 200 * ($workingHours - $workedHours); 
                        }
                    }
                } elseif ($status == 'Leave') {
                    $fineForDay = 1000; 
                }

                $totalFine += $fineForDay;
            }
        }

        Mail::to($employee->email)->send(new FineMail($employee->full_name, $totalFine));

        return redirect()->back()->with('success', 'Mail sent successfully');
    }

    private function calculateWorkedHours($innTime, $outTime)
    {
        $innTimeCarbon = Carbon::createFromFormat('h:i A', $innTime, 'Asia/Karachi');
        $outTimeCarbon = Carbon::createFromFormat('h:i A', $outTime, 'Asia/Karachi');

        $hoursDifference = $innTimeCarbon->diff($outTimeCarbon);
        return $hoursDifference->h + ($hoursDifference->i / 60);
    }
}

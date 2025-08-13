<?php

namespace App\Services;

class MenuService
{
  public static function forRole(string $role): array
  {
    return match ($role) {
      'admin' => [
        ['label' => 'Dashboard', 'icon' => 'flaticon-dashboard', 'href' => route('dashboard')],
        ['label' => 'Students', 'icon' => 'flaticon-classmates', 'submenu' => [
          ['label' => 'All Students', 'href' => route('admin.students')],
          ['label' => 'Student Complaints', 'href' => route('admin.complaints.index')],
        ]],
        ['label' => 'Complaints', 'icon' => 'flaticon-checklist', 'href' => route('admin.complaints.index')],
      ],

      'student' => [
        ['label' => 'Dashboard', 'icon' => 'flaticon-dashboard', 'href' => route('dashboard')],
        ['label' => 'Complaints', 'icon' => 'flaticon-checklist', 'href' => route('student.complaints.index')],
        ['label' => 'New Complaint', 'icon' => 'flaticon-edit', 'href' => route('student.complaints.create')],
      ],

      'alumni' => [
        ['label' => 'Dashboard', 'icon' => 'flaticon-dashboard', 'href' => route('dashboard')],
        ['label' => 'Benefits', 'icon' => 'flaticon-gift', 'href' => route('alumni.benefits')],
        ['label' => 'Graduate Support', 'icon' => 'flaticon-life-buoy', 'href' => route('alumni.support')],
        ['label' => 'Networking Events', 'icon' => 'flaticon-calendar', 'href' => route('alumni.events')],
        ['label' => 'Recent Graduates', 'icon' => 'flaticon-users', 'href' => route('alumni.recent')],
        ['label' => 'Mentorship', 'icon' => 'flaticon-graduation-cap', 'href' => route('alumni.mentorship')],
        ['label' => 'Account', 'icon' => 'flaticon-user', 'href' => route('alumni.account')],
      ],

      default => [],
    };
  }
}

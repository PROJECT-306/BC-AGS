<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;
use Illuminate\View\View;
use App\Models\Department;

class Navigation extends Component
{
    public $departments;

    public function __construct($departments)
    {
        $this->departments = $departments; // Store the departments
    }

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.navigation'); // Ensure this matches the path to your navigation view
    }
} 
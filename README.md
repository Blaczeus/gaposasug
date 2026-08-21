# GAPOSASUG

GAPOSASUG is a Laravel-based student administration and engagement platform originally developed for an educational institution.

The project was designed to bring several student-facing and administrative workflows into one system, including courses, departments, notices, complaints, administrative responses, and student union-related functionality.

Development progressed significantly on the backend before the project was discontinued after business priorities changed.

> **Status:** Discontinued before completion. The repository is preserved as a development-stage project demonstrating the implemented backend architecture and workflows.

## Tech Stack

**Backend**

<p>
  <img src="https://img.shields.io/badge/PHP-777BB4?logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/Laravel-FF2D20?logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/MySQL-4479A1?logo=mysql&logoColor=white" alt="MySQL">
</p>

**Frontend**

<p>
  <img src="https://img.shields.io/badge/Vue.js-4FC08D?logo=vuedotjs&logoColor=white" alt="Vue.js">
  <img src="https://img.shields.io/badge/Inertia.js-9553E9?logo=inertia&logoColor=white" alt="Inertia.js">
  <img src="https://img.shields.io/badge/Tailwind_CSS-06B6D4?logo=tailwindcss&logoColor=white" alt="Tailwind CSS">
  <img src="https://img.shields.io/badge/Vite-646CFF?logo=vite&logoColor=white" alt="Vite">
</p>

## Core Functionality

### Student Administration

The platform was designed to provide a central system for student and institutional information.

The application includes backend structures for areas such as:

- Students
- Courses
- Departments
- Notices
- Complaints
- Administrative responses
- Student-facing dashboards
- Administrative workflows

Separate student and administrative areas were developed to support role-specific functionality.

### Complaint Management

One of the more developed parts of the application is the complaint workflow.

Students can submit complaints through the system, while administrators can review and respond to them.

The complaint lifecycle includes:

- Student complaint submission
- Complaint ownership and authorization
- Administrative review
- Status tracking
- Administrative responses
- Complaint archiving
- Complaint restoration
- Student-visible progress updates

Complaint statuses can move through stages such as:

- `pending`
- `in_progress`
- `resolved`

This allows students to follow the progress of an issue rather than submitting a complaint and receiving no further visibility.

### Complaint Responses

Administrators can respond directly to student complaints within the platform.

Responses are linked to the relevant complaint and provide a way for administrators to communicate progress or resolution information back to the student.

This was intended to create a clearer feedback loop between students and the institution.

### Notice Management

The application includes a notice system for distributing institutional information to students.

Notice functionality includes:

- General notices
- Course-targeted notices
- Department-targeted notices
- Active date ranges
- Important or pinned notices
- Read/unread tracking
- Per-user notice read records

This allows notices to be targeted rather than treating every announcement as relevant to every student.

### Read Tracking

The notice system records whether individual users have read specific notices.

This makes it possible to distinguish between:

- Notices available to a student
- Notices already read
- Unread notices requiring attention

The same structure can support dashboard indicators and notification-related workflows.

### Courses & Departments

The project includes domain structures for courses and departments, allowing student and institutional data to be organized around academic relationships.

These structures provide the foundation for features such as:

- Course-related student information
- Department-based filtering
- Targeted notices
- Student academic context

## Application Architecture

The application follows Laravel's MVC architecture with separate areas for student, administrative, authentication, and settings functionality.

The backend includes:

- Controllers
- Models
- Form requests
- Policies
- Services
- Middleware
- Enums
- Database migrations

This structure was used to separate business rules, authorization, validation, and domain-specific behavior as the project expanded.

## Authorization

Laravel policies are used to control access to complaint-related actions and other protected workflows.

The authorization layer was intended to ensure that students could only interact with appropriate records while administrative users had access to management functionality.

Because the project was discontinued before completion, authorization coverage is not yet fully consistent across every controller action.

## Domain Structure

The application models several related areas of the student-management domain, including:

- Students
- Courses
- Departments
- Complaints
- Complaint responses
- Notices
- Notice read records
- Administrative users

These relationships support student-specific content, complaint tracking, targeted notices, and administrative workflows.

## Technical Highlights

The project demonstrates:

- Laravel MVC application architecture
- Relational data modelling with Eloquent
- Role-aware authorization using policies
- Form request validation
- Complaint lifecycle and status management
- Administrative response workflows
- Soft deletion, archiving, and restoration
- Targeted institutional notices
- Read/unread tracking
- Course and department relationships
- Separate student and administrative application areas
- Reusable services and domain-focused backend structure

## Current Project State

### Implemented / Partially Implemented

- Student-facing application structure
- Administrative application structure
- Course management
- Department-related functionality
- Complaint submission
- Complaint status tracking
- Administrative complaint responses
- Complaint archiving and restoration
- Notice management
- Notice audience targeting
- Notice active-date rules
- Read/unread notice tracking
- Authentication-related functionality
- Authorization policies
- Database relationships and migrations

### Incomplete / Not Finalized

- Full production hardening
- Complete authorization coverage
- Final administrative workflows
- Student union voting functionality
- Final frontend polish
- Expanded automated test coverage
- Deployment and production preparation

## Project Status

Development was stopped before the platform reached production after project priorities changed.

The repository is kept public as a record of the architecture, backend workflows, and development work completed during the project.

## License

No license is currently specified for this repository.

Unless a license is added, the source code should not be assumed to grant reuse, modification, or redistribution rights.

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
use Carbon\Carbon;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $courses = [
            ['name' => 'Business Information Systems', 'code' => 'BIS101', 'level' => 'ND', 'description' => 'An introduction to business information systems.', 'department' => 'Computer Science', 'created_at' => $now, 'updated_at' => $now,],
            ['name' => 'Introduction to Computer Programming', 'code' => 'CS101', 'department' => 'Computer Science', 'level' => 'ND', 'description' => 'Fundamentals of programming using a high-level language.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Data Structures and Algorithms', 'code' => 'CS102', 'department' => 'Computer Science', 'level' => 'ND', 'description' => 'Basic data structures and algorithm analysis.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Database Management Systems', 'code' => 'CS201', 'department' => 'Computer Science', 'level' => 'HND', 'description' => 'Design and implementation of relational databases.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Web Application Development', 'code' => 'CS202', 'department' => 'Computer Science', 'level' => 'HND', 'description' => 'Building dynamic web applications with modern frameworks.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Operating Systems Concepts', 'code' => 'CS301', 'department' => 'Computer Science', 'level' => 'HND', 'description' => 'Processes, memory management, file systems and concurrency.', 'created_at' => $now, 'updated_at' => $now],

            ['name' => 'Advanced Mechanical Engineering', 'code' => 'MECH201', 'level' => 'HND', 'description' => 'A comprehensive course on advanced mechanical engineering principles.', 'department' => 'Mechanical Engineering', 'created_at' => $now, 'updated_at' => $now,],
            ['name' => 'Thermodynamics and Heat Transfer', 'code' => 'MECH302', 'level' => 'HND', 'description' => 'Explores thermodynamic systems, cycles, and principles of heat transfer in engineering applications.', 'department' => 'Mechanical Engineering', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Fluid Mechanics and Hydraulic Machines', 'code' => 'MECH304', 'level' => 'HND', 'description' => 'Focuses on fluid flow, pipe systems, and hydraulic machine design.', 'department' => 'Mechanical Engineering', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Engineering Materials and Metallurgy', 'code' => 'MECH308', 'level' => 'HND', 'description' => 'Covers mechanical properties, testing, and heat treatment of metals and alloys.', 'department' => 'Mechanical Engineering', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Machine Design and Production Technology', 'code' => 'MECH312', 'level' => 'HND', 'description' => 'Advanced design principles, tolerances, fits, and manufacturing processes.', 'department' => 'Mechanical Engineering', 'created_at' => $now, 'updated_at' => $now],

            ['name' => 'Mass Communication Theory', 'code' => 'MC101', 'department' => 'Mass Communication', 'level' => 'ND', 'description' => 'Foundations of mass media and its social impact.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Broadcast Journalism', 'code' => 'MC102', 'department' => 'Mass Communication', 'level' => 'ND', 'description' => 'Techniques of radio and television news gathering.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Digital Media Production', 'code' => 'MC201', 'department' => 'Mass Communication', 'level' => 'HND', 'description' => 'Advanced practices in digital video and audio production.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Public Relations Strategies', 'code' => 'MC202', 'department' => 'Mass Communication', 'level' => 'HND', 'description' => 'Planning and management of PR campaigns.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Media Ethics and Law', 'code' => 'MC301', 'department' => 'Mass Communication', 'level' => 'HND', 'description' => 'Legal and ethical frameworks governing media practice.', 'created_at' => $now, 'updated_at' => $now],

            ['name' => 'Principles of Accounting', 'code' => 'BA101', 'department' => 'Business Administration', 'level' => 'ND', 'description' => 'Introduction to financial and managerial accounting.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Business Law', 'code' => 'BA102', 'department' => 'Business Administration', 'level' => 'ND', 'description' => 'Legal environment of business operations.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Organizational Behavior', 'code' => 'BA201', 'department' => 'Business Administration', 'level' => 'HND', 'description' => 'Human behavior in organizational settings.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Marketing Management', 'code' => 'BA202', 'department' => 'Business Administration', 'level' => 'HND', 'description' => 'Planning and implementation of marketing strategies.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Strategic Management', 'code' => 'BA301', 'department' => 'Business Administration', 'level' => 'HND', 'description' => 'Formulation and execution of strategic business policies.', 'created_at' => $now, 'updated_at' => $now],

            ['name' => 'Circuit Theory', 'code' => 'EE101', 'department' => 'Electrical Engineering', 'level' => 'ND', 'description' => 'Basic analysis of electrical circuits.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Electronics I', 'code' => 'EE102', 'department' => 'Electrical Engineering', 'level' => 'ND', 'description' => 'Semiconductor devices and their applications.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Signals and Systems', 'code' => 'EE201', 'department' => 'Electrical Engineering', 'level' => 'HND', 'description' => 'Time and frequency domain analysis of signals.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Power Systems', 'code' => 'EE202', 'department' => 'Electrical Engineering', 'level' => 'HND', 'description' => 'Generation, transmission, and distribution of electrical power.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Control Engineering', 'code' => 'EE301', 'department' => 'Electrical Engineering', 'level' => 'HND', 'description' => 'Feedback control systems design and stability analysis.', 'created_at' => $now, 'updated_at' => $now],

            ['name' => 'General Biology', 'code' => 'SLT101', 'department' => 'Science Laboratory Technology', 'level' => 'ND', 'description' => 'Fundamental principles of biology.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Chemistry for Laboratory Sciences', 'code' => 'SLT102', 'department' => 'Science Laboratory Technology', 'level' => 'ND', 'description' => 'Basic inorganic and organic chemistry.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Microbiology Techniques', 'code' => 'SLT201', 'department' => 'Science Laboratory Technology', 'level' => 'HND', 'description' => 'Laboratory methods in microbiology.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Clinical Biochemistry', 'code' => 'SLT202', 'department' => 'Science Laboratory Technology', 'level' => 'HND', 'description' => 'Analysis of biochemical processes in diagnostics.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Hematology and Hemostasis', 'code' => 'SLT301', 'department' => 'Science Laboratory Technology', 'level' => 'HND', 'description' => 'Blood cell analysis and coagulation studies.', 'created_at' => $now, 'updated_at' => $now],

            ['name' => 'Soil Science', 'code' => 'AGT101', 'department' => 'Agricultural Technology', 'level' => 'ND', 'description' => 'Properties and classification of soils.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Crop Production', 'code' => 'AGT102', 'department' => 'Agricultural Technology', 'level' => 'ND', 'description' => 'Principles of growing field crops.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Plant Pathology', 'code' => 'AGT201', 'department' => 'Agricultural Technology', 'level' => 'HND', 'description' => 'Diseases of crop plants and control methods.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Farm Machinery', 'code' => 'AGT202', 'department' => 'Agricultural Technology', 'level' => 'HND', 'description' => 'Design and maintenance of agricultural machinery.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Agricultural Economics', 'code' => 'AGT301', 'department' => 'Agricultural Technology', 'level' => 'HND', 'description' => 'Economic principles applied to agriculture.', 'created_at' => $now, 'updated_at' => $now],

            ['name' => 'Engineering Drawing', 'code' => 'ME101', 'department' => 'Mechanical Engineering', 'level' => 'ND', 'description' => 'Techniques for technical drawing and CAD.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Workshop Technology', 'code' => 'ME102', 'department' => 'Mechanical Engineering', 'level' => 'ND', 'description' => 'Hands-on skills in metal and wood workshops.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Thermodynamics', 'code' => 'ME201', 'department' => 'Mechanical Engineering', 'level' => 'HND', 'description' => 'Energy conversion and heat transfer.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Fluid Mechanics', 'code' => 'ME202', 'department' => 'Mechanical Engineering', 'level' => 'HND', 'description' => 'Behavior of fluids in motion and at rest.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Machine Design', 'code' => 'ME301', 'department' => 'Mechanical Engineering', 'level' => 'HND', 'description' => 'Design principles of mechanical components.', 'created_at' => $now, 'updated_at' => $now],

            ['name' => 'Civil Engineering Materials', 'code' => 'CE101', 'department' => 'Civil Engineering', 'level' => 'ND', 'description' => 'Properties and testing of construction materials.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Surveying Principles', 'code' => 'CE102', 'department' => 'Civil Engineering', 'level' => 'ND', 'description' => 'Techniques and tools for land measurement.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Structural Analysis', 'code' => 'CE201', 'department' => 'Civil Engineering', 'level' => 'HND', 'description' => 'Analysis of statically determinate structures.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Geotechnical Engineering', 'code' => 'CE202', 'department' => 'Civil Engineering', 'level' => 'HND', 'description' => 'Study of soil behavior and foundation design.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Transportation Engineering', 'code' => 'CE301', 'department' => 'Civil Engineering', 'level' => 'HND', 'description' => 'Planning and design of transportation systems.', 'created_at' => $now, 'updated_at' => $now],

            ['name' => 'Circuit Analysis II', 'code' => 'EE103', 'department' => 'Electrical Engineering', 'level' => 'ND', 'description' => 'Advanced methods in analyzing complex circuits.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Digital Logic Design', 'code' => 'EE203', 'department' => 'Electrical Engineering', 'level' => 'HND', 'description' => 'Design of combinational and sequential circuits.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Embedded Systems', 'code' => 'EE302', 'department' => 'Electrical Engineering', 'level' => 'HND', 'description' => 'Microcontroller-based system design and programming.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Electrical Machines and Drives', 'code' => 'EE208', 'department' => 'Electrical Engineering', 'level' => 'ND', 'description' => 'Study of motors, generators, and electric drives.', 'created_at' => $now, 'updated_at' => $now],

            ['name' => 'Human Anatomy', 'code' => 'BIO102', 'department' => 'Biology', 'level' => 'ND', 'description' => 'Structural organization of the human body.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Zoology', 'code' => 'BIO103', 'department' => 'Biology', 'level' => 'ND', 'description' => 'Classification and physiology of animals.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Botany and Plant Physiology', 'code' => 'BIO204', 'department' => 'Biology', 'level' => 'ND', 'description' => 'Study of plant structure and physiological functions.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Molecular Biology Techniques', 'code' => 'BIO301', 'department' => 'Biology', 'level' => 'HND', 'description' => 'Hands-on lab techniques in molecular and cell biology.', 'created_at' => $now, 'updated_at' => $now],

            ['name' => 'Pharmaceutical Chemistry', 'code' => 'CHE201', 'department' => 'Chemistry', 'level' => 'HND', 'description' => 'Chemical principles in drug design and analysis.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Organic Synthesis', 'code' => 'CHE202', 'department' => 'Chemistry', 'level' => 'HND', 'description' => 'Methods and mechanisms in organic compound synthesis.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Inorganic Chemistry I', 'code' => 'CHE101', 'department' => 'Chemistry', 'level' => 'ND', 'description' => 'Fundamentals of inorganic compounds and reactions.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Analytical Chemistry Techniques', 'code' => 'CHE305', 'department' => 'Chemistry', 'level' => 'HND', 'description' => 'Quantitative and qualitative analysis of compounds.', 'created_at' => $now, 'updated_at' => $now],

            ['name' => 'Urban Planning Principles', 'code' => 'URP101', 'department' => 'Urban & Regional Planning', 'level' => 'ND', 'description' => 'Introduction to planning processes and theories.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Regional Development Theory', 'code' => 'URP201', 'department' => 'Urban & Regional Planning', 'level' => 'HND', 'description' => 'Strategies for regional growth and development.', 'created_at' => $now, 'updated_at' => $now],

            ['name' => 'Environmental Impact Assessment', 'code' => 'ENV101', 'department' => 'Environmental Management', 'level' => 'ND', 'description' => 'Procedures for evaluating environmental effects.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Waste Management Technology', 'code' => 'ENV202', 'department' => 'Environmental Management', 'level' => 'HND', 'description' => 'Techniques for solid and liquid waste treatment.', 'created_at' => $now, 'updated_at' => $now],

            ['name' => 'Financial Accounting', 'code' => 'ACC201', 'department' => 'Accountancy', 'level' => 'HND', 'description' => 'Preparation and analysis of financial statements.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Taxation Principles', 'code' => 'ACC202', 'department' => 'Accountancy', 'level' => 'HND', 'description' => 'Concepts and applications of tax law.', 'created_at' => $now, 'updated_at' => $now],

            ['name' => 'Library Cataloguing', 'code' => 'LIB101', 'department' => 'Library Science', 'level' => 'ND', 'description' => 'Systems for organizing library materials.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Information Retrieval', 'code' => 'LIB201', 'department' => 'Library Science', 'level' => 'HND', 'description' => 'Techniques for searching and retrieving data.', 'created_at' => $now, 'updated_at' => $now],

            ['name' => 'Software Engineering Fundamentals', 'code' => 'SWE101', 'department' => 'Software Engineering', 'level' => 'ND', 'description' => 'Principles of software development life cycle.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Object-Oriented Programming', 'code' => 'SWE102', 'department' => 'Software Engineering', 'level' => 'ND', 'description' => 'Design and implementation using OOP concepts.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Systems Analysis and Design', 'code' => 'SWE201', 'department' => 'Software Engineering', 'level' => 'HND', 'description' => 'Methodologies for analyzing business systems.', 'created_at' => $now, 'updated_at' => $now],

            ['name' => 'Mobile App Development', 'code' => 'IT101', 'department' => 'Information Technology', 'level' => 'ND', 'description' => 'Building applications for mobile platforms.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Network Administration', 'code' => 'IT201', 'department' => 'Information Technology', 'level' => 'HND', 'description' => 'Management of LAN and WAN environments.', 'created_at' => $now, 'updated_at' => $now],

            ['name' => 'Hotel Operations', 'code' => 'HM101', 'department' => 'Hospitality Management', 'level' => 'ND', 'description' => 'Fundamentals of hotel front office and housekeeping.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Food and Beverage Management', 'code' => 'HM201', 'department' => 'Hospitality Management', 'level' => 'HND', 'description' => 'Planning and service in food production units.', 'created_at' => $now, 'updated_at' => $now],

            ['name' => 'Tourism Geography', 'code' => 'TUR101', 'department' => 'Tourism', 'level' => 'ND', 'description' => 'Spatial aspects of tourism activities.', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Tour Operations Management', 'code' => 'TUR201', 'department' => 'Tourism', 'level' => 'HND', 'description' => 'Planning and organizing tour services.', 'created_at' => $now, 'updated_at' => $now],

        ];

        Course::insert($courses);
    }
}

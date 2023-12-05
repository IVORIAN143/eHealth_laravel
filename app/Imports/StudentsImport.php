<?php

namespace App\Imports;

use App\Models\student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    private $importedData = [];

    public function model(array $row)
    {
        // Manipulate and format data before inserting
        $studentNameParts = explode(' ', $row['name']);
        $lastName = $studentNameParts[0] ?? null;
        $firstName = $studentNameParts[1] ?? null;
        $middleName = $studentNameParts[2] ?? null;
        $formattedData = [
            'lastname' => $lastName,
            'firstname' => $firstName,
            'middlename' => $middleName,
            'contact' => $row['contact'],
            'course' => $row['course'],
            'year' => $row['year'],
            'semester' => $row['semester'],
            'schoolYear' => $row['schoolyear'],
            'dateOfBirth' => $row['dateOfBirth'],
        ];

        // Check if the student_id already exists in the database
        $existingStudent = Student::where('student_id', $row['student_id'])->first();

        if ($existingStudent) {

            return null;
        }

        // If the student_id doesn't exist, create a new Student instance and return it
        $formattedData['student_id'] = $row['student_id'];
        $newStudent = new Student($formattedData);

        // Store the processed data in an array
        $this->importedData[] = $formattedData;

        return $newStudent;
    }

    public function getImportedData()
    {
        return $this->importedData;
    }
}

<?php

namespace App\Imports;

use App\Models\Student;
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
            'student_id' => $row['student_id'],
            'lastname' => $lastName,
            'firstname' => $firstName,
            'middlename' => $middleName,
            'contact' => $row['contact'],
            'course' => $row['course'],
            'year' => $row['year'],
            'semester' => $row['semester'],
            // 'schoolYear' => $row['schoolYear'],
            // ... map other fields as needed
        ];
        return new Student($formattedData);

        // Store the processed data in an array
        $this->importedData[] = $formattedData;
    }

    public function getImportedData()
    {
        return $this->importedData;
    }
}

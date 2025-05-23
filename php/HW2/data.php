<?php

$filename = "students.json";

// Make sure the file exists
if (!file_exists($filename)) {
    file_put_contents($filename, json_encode([]));
}

// Load existing data
$students = json_decode(file_get_contents($filename), true);

// Save or update student
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? uniqid();
    $name = $_POST['name'] ?? '';
    $age = $_POST['age'] ?? '';
    $action = $_POST['action'] ?? '';

    if ($action === "save") {
        $found = false;
        foreach ($students as &$student) {
            if ($student['id'] === $id) {
                $student['name'] = $name;
                $student['age'] = $age;
                $found = true;
                break;
            }
        }
        if (!$found) {
            $students[] = ['id' => $id, 'name' => $name, 'age' => $age];
        }

        file_put_contents($filename, json_encode($students));
        exit;
    }

    if ($action === "delete") {
        $students = array_filter($students, fn($s) => $s['id'] !== $id);
        file_put_contents($filename, json_encode(array_values($students)));
        exit;
    }
}

// Get specific student
if ($_GET['action'] === 'get') {
    $id = $_GET['id'] ?? '';
    foreach ($students as $student) {
        if ($student['id'] === $id) {
            echo json_encode($student);
            exit;
        }
    }
    echo "{}";
    exit;
}

// List all students
if ($_GET['action'] === 'list') {
    foreach ($students as $student) {
        echo "<tr>
                <td>{$student['name']}</td>
                <td>{$student['age']}</td>
                <td>
                    <button class='edit' data-id='{$student['id']}'>Edit</button>
                    <button class='delete' data-id='{$student['id']}'>Delete</button>
                </td>
              </tr>";
    }
    exit;
}

?>

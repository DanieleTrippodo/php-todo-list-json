<?php




header('Content-Type: application/json');

$action = $_GET['action'] ?? '';

if (!in_array($action, ['read', 'add', 'delete'])) {
    echo json_encode(['error' => 'Invalid action']);
    exit;
}

$filename = 'todos.json';

if (!file_exists($filename)) {
    file_put_contents($filename, json_encode([]));
}

$todos = json_decode(file_get_contents($filename), true);

if ($action === 'read') {
    echo json_encode($todos);
} elseif ($action === 'add') {
    $input = json_decode(file_get_contents('php://input'), true);
    $todos[] = $input;
    file_put_contents($filename, json_encode($todos));
    echo json_encode($input);
} elseif ($action === 'delete') {
    $input = json_decode(file_get_contents('php://input'), true);
    $todos = array_filter($todos, function($todo) use ($input) {
        return $todo['text'] !== $input['text'];
    });
    file_put_contents($filename, json_encode($todos));
    echo json_encode(['success' => true]);
}





?>

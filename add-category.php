<?php include_once 'config/init.php'; ?>

<?php
$category = new Category();

if (isset($_POST['submit'])) {

    $category_name = validateInput($_POST['name']);
    $color = $_POST['color'];

    if (empty($category_name)) {

        header("Location: templates/add-category-form?error=Name is required");
        exit();

    } else {
        $category->addCategory($category_name, $color);
        header("Location: templates/index.php");
        exit();
    }
}
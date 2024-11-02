<?php
require_once 'dbConfig.php';
require_once 'models.php';

if (isset($_POST['insertAdvertAgentBtn'])) {
    $firstName = sanitizeInput($_POST['firstName']);
    $lastName = sanitizeInput($_POST['lastName']);
    $workSpaceNickname = sanitizeInput($_POST['WorkSpaceNickname']);
    $gender = sanitizeInput($_POST['gender']);
    $dateOfBirth = sanitizeInput($_POST['dateOfBirth']);
    
    $query = insertAdvertAgent($pdo, $firstName, $lastName, $workSpaceNickname, $gender, $dateOfBirth);
    
    if ($query) {
        logAuditAction($pdo, 'Inserted Advert Agent', $_SESSION['username'], $_SESSION['user_id']);
        header("Location: ../index.php");
    } else {
        echo "Insertion failed";
    }
}

if (isset($_POST['editAdvertAgentBtn'])) {
    $firstName = sanitizeInput($_POST['firstName']);
    $lastName = sanitizeInput($_POST['lastName']);
    $workSpaceNickname = sanitizeInput($_POST['workSpaceNickname']);
    $gender = sanitizeInput($_POST['gender']);
    $dateOfBirth = sanitizeInput($_POST['dateOfBirth']);

    $query = updateAdvertAgent($pdo, $firstName, $lastName, $workSpaceNickname, $gender, $dateOfBirth, $_GET['advertisingAgent_id']);

    if ($query) {
        logAuditAction($pdo, 'Edited Advert Agent', $_SESSION['username'], $_SESSION['user_id']);
        header("Location: ../index.php");
    } else {
        echo "Edit failed";
    }
}

if (isset($_POST['deleteAdvertAgentBtn'])) {
    $query = deleteAdvertAgent($pdo, $_GET['advertisingAgent_id']);

    if ($query) {
        logAuditAction($pdo, 'Deleted Advert Agent', $_SESSION['username'], $_SESSION['user_id']);
        header("Location: ../index.php");
    } else {
        echo "Deletion failed";
    }
}

if (isset($_POST['insertNewProjectBtn'])) {
    $projectName = sanitizeInput($_POST['AdvertisingProjectName']);
    $kindOfProduct = sanitizeInput($_POST['kindOfProduct']);
    $brandName = sanitizeInput($_POST['brandName']);
    $targetAudience = sanitizeInput($_POST['targetAudience']);

    $query = insertProject($pdo, $projectName, $kindOfProduct, $brandName, $targetAudience, $_SESSION['user_id'], $_GET['advertisingAgent_id']);

    if ($query) {
        logAuditAction($pdo, 'Inserted New Project', $_SESSION['username'], $_SESSION['user_id']);
        header("Location: ../viewprojects.php?advertisingAgent_id=" .$_GET['advertisingAgent_id']);
    } else {
        echo "Insertion failed";
    }
}

if (isset($_POST['editProjectBtn'])) {
    $projectName = sanitizeInput($_POST['advertisingProjectName']);
    $kindOfProduct = sanitizeInput($_POST['kindOfProduct']);
    $brandName = sanitizeInput($_POST['brandName']);
    $targetAudience = sanitizeInput($_POST['targetAudience']);

    $query = updateProject($pdo, $projectName, $kindOfProduct, $brandName, $targetAudience, $_GET['project_id']);

    if ($query) {
        logAuditAction($pdo, 'Edited Project', $_SESSION['username'], $_SESSION['user_id']);
        header("Location: ../viewprojects.php?advertisingAgent_id=" .$_GET['advertisingAgent_id']);
    } else {
        echo "Edit failed";
    }
}

if (isset($_POST['deleteProjectBtn'])) {
    $query = deleteProject($pdo, $_GET['project_id']);

    if ($query) {
        logAuditAction($pdo, 'Deleted Project', $_SESSION['username'], $_SESSION['user_id']);
        header("Location: ../viewprojects.php?advertisingAgent_id=" .$_GET['advertisingAgent_id']);
    } else {
        echo "Deletion failed";
    }
}

if (isset($_POST['registerUserBtn'])) {
    $username = sanitizeInput($_POST['username']);
    $firstname = sanitizeInput($_POST['firstname']);
    $lastname = sanitizeInput($_POST['lastname']);
    $branchlocation = sanitizeInput($_POST['branchlocation']);
    $password = $_POST['password'];

    if (!empty($username) && !empty($firstname) && !empty($lastname) && !empty($branchlocation) && !empty($password)) {
        if (validatePassword($password)) {
            $hashedPassword = sha1($password);
            $insertQuery = insertNewUser($pdo, $username, $firstname, $lastname, $branchlocation, $hashedPassword);

            if ($insertQuery) {
                logAuditAction($pdo, 'Registered User', $username, null); 
                header("Location: ../login.php");
            } else {
                header("Location: ../register.php");
            }
        } else {
            $_SESSION['message'] = "Password must be at least 8 characters, including a lowercase letter, an uppercase letter, and a number.";
            header("Location: ../register.php");
        }
    } else {
        $_SESSION['message'] = "Please make sure the input fields are not empty for registration!";
        header("Location: ../login.php");
    }
}

if (isset($_POST['loginUserBtn'])) {
    $username = sanitizeInput($_POST['username']);
    $password = sha1($_POST['password']);

    if (!empty($username) && !empty($password)) {
        $loginQuery = loginUser($pdo, $username, $password);

        if ($loginQuery) {
            logAuditAction($pdo, 'User Login', $username, $_SESSION['user_id']);
            header("Location: ../index.php");
        } else {
            header("Location: ../login.php");
        }
    } else {
        $_SESSION['message'] = "Please make sure the input fields are not empty for the login!";
        header("Location: ../login.php");
    }
}

if (isset($_GET['logoutAUser'])) {
    unset($_SESSION['username']);
    logAuditAction($pdo, 'User Logout', $_SESSION['username'], $_SESSION['user_id']);
    header('Location: ../login.php');
}
?>

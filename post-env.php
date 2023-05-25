<?php
    session_start();
    include "util.php";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = array();
        $data["USERNAME"] = $_POST["username"];
        $data["PASSWORD"] = $_POST["password"];
        $data["ES_CLUSTER_URL"] = $_POST["cluster_url"];
        $data["APPBASE_ID"] = $_POST["appbase_id"];
        $data["ZINC_CLUSTER_URL"] = "http://reactivesearch:zincf0rami@localhost:4080";
        if (isset($_POST["set_sniffing"])) {
            $data["SET_SNIFFING"] = "true";
        } else {
            $data["SET_SNIFFING"] = "false";
        }
        if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["cluster_url"]) && isset($_POST["appbase_id"]) && !empty($_POST["username"]) && !empty($_POST["username"]) && !empty($_POST["cluster_url"]) && !empty($_POST["appbase_id"])) {
            upsertEnvVars($data);
            upsertLogFile($data);
            logout("?success=Data updated successfully");
        } else {
            header("Location: env.php?error=Invalid parameters");
        }
    } else {
        header("Location: index.php?error=Invalid method");
    }
?>
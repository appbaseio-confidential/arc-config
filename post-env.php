<?php
    session_start();
    include "util.php";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = array();
        $data["USERNAME"] = $_POST["username"];
        $data["PASSWORD"] = $_POST["password"];
        $data["ES_CLUSTER_URL"] = $_POST["cluster_url"];
        $data["ARC_ID"] = $_POST["arc_id"];
        $data["LOG_FILE_PATH"] = "/reactivesearch-data/es.json";
        $data["PIPELINE_LOG_FILE_PATH"] = "/reactivesearch-data/pipeline.json";
        if (isset($_POST["set_sniffing"])) {
            $data["SET_SNIFFING"] = "true";
        } else {
            $data["SET_SNIFFING"] = "false";
        }
        if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["cluster_url"]) && isset($_POST["arc_id"]) && !empty($_POST["username"]) && !empty($_POST["username"]) && !empty($_POST["cluster_url"]) && !empty($_POST["arc_id"])) {
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

<?php
class Images
{

    private PDO $sql;

    /**
     *
     * @param PDO $sql Database connection object (PDO)
     */
    public function __construct(PDO $sql) 
    {
        $this->sql = $sql;
    }

function uploadImage($request, $response, $container) {
    if (isset($_FILES['event_image'])) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["event_image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if image file is an actual image or fake image
        $check = getimagesize($_FILES["event_image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($targetFile)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["event_image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["event_image"]["tmp_name"], $targetFile)) {
                echo "The file ". htmlspecialchars(basename($_FILES["event_image"]["name"])). " has been uploaded.";
                
                // Insert image path into database
                $conn = $container->get('db'); // Assuming you have a database connection in your container
                $eventId = $_POST['event_id']; // Assuming you have the event ID from the form
                $sql = "INSERT INTO images (url, event_id) VALUES (?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("si", $targetFile, $eventId);
                if ($stmt->execute()) {
                    echo "Image path saved to database.";
                } else {
                    echo "Error: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }}
}
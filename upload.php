 <?php
    //allowable image extension
    $imgExt = array("jpeg", "jpg", "png", "gif", "JPG", "PNG");
    //allowable video extension
    $videoExt = array("mp4", "mkv", "avi", "mov");
    //allowable audio extension
    $audioExt = array("mp3", "m4a");
    $i=1;
    if(isset($_REQUEST['submit']))
    {
        $filename=  $_FILES["file"]["name"];
        $fileExt = pathinfo($filename, PATHINFO_EXTENSION);
    
        if (in_array($fileExt, $imgExt))
        {
            if(file_exists($_FILES["file"]["name"]))
            {
                echo "File name exists.";
            }
            else
            {  
                move_uploaded_file($_FILES["file"]["tmp_name"], "images/$i.$fileExt");
                $i=$i+1;
                echo "File successfully uploaded.\nRedirecting...";
            }
        }
        
        else if(in_array($fileExt, $videoExt)){
            if(file_exists($_FILE["file"]["name"])){
                echo "File already exists at given destinaiton";
            }
            else{
                move_uploaded_file($_FILES["file"]["tmp_name"], "videos/$filename");
                echo "File successfully uploaded.\nRedirecting...";
            }
        }
        
        else{
            echo "Invalid file type.\n Please wait Redirecting...";    
        }
    }
    
    header('Refresh: 2;url=index.html');
?>
    
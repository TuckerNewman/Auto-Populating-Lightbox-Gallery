<!DOCTYPE html>
<html>

<head>

<meta content="text/html; charset=utf-8" http-equiv="Content-Type">


<!--Adjusts page content sizing to smaller screens-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">



<title>Lightbox</title>


<!--Bootstrap for rwd-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


<link rel="stylesheet" href="css/styles.css"  type="text/css">


</head>



<body>



    <div class = "container-fluid">


        <h1 id = "title" class = "text-center">Lightbox Demo</h1>


        <div>

                <?php

                    //Defined function to sort and output images by their creation date (desc)
                    function dateSortDec($img1, $img2) {
                        $imgDate1 = strtotime($img1['datetime']);
                        $imgDate2 = strtotime($img2['datetime']);
                        return $imgDate2 - $imgDate1; //reversed for descending order
                    }


                    //Directory information
                    $directory = "img";
                    $ext = ".jpg";
                    $images = glob($directory . "/*.jpg");

                    //Initialize multidimensional array
                    $imageArray = Array();

                    //loops through directory and puts an array inside imagesArray
                    foreach ($images as $image)
                    {

                       $imageArray[] = 
                       Array (
                           'src' => $image,
                           'datetime' => date ("F d Y", filemtime($image))
                       
                        );
                       
                    }

                    //sorts array by date descending using function created above
                    usort($imageArray, "dateSortDec");

                    $count = 0; //used to index lightbox

                    foreach ($imageArray as $image)
                    {
                        
                        $src = $image['src'];

                        $alt = str_replace($directory . '/', "", $src); //removes directory
                        $alt = str_replace($ext, "", $alt); //removes file extension
                        
                        echo "<img class = 'portImg' alt = '$alt' src = '$src' 
                        onclick = 'openLightBox();currentImg($count)'/>";

                        $count++;
                        
                    }
        
                ?>
        </div>

        
        <div id = "lightbox">

            <a id = "close" onclick = "closeLightBox()">&times;</a>

            <a id="prev" onclick = "changeImg(-1)">&#10094;</a>
                <img id = "activeImg" src="" alt="" />
            <a id="next" onclick = "changeImg(1)">&#10095;</a>
            
        </div>
                


    </div>


<!--js file for make the lightbox effect work-->
<script src = "js/lightbox.js"></script>




</body>

</html>

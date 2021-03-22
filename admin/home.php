<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/styles.css">
    <title>Coneybeare Catalog Admin Homepage</title>
    <script src="scripts/admin-scripts.js"></script>
</head>
<body>
<nav class="bg-warning text-dark nav navbar">
    <a class="navbar-brand navbar-link" href="/">Coneybeare Admin Page</a>
    <div class="navbar-nav">
        <span class="ml-auto">Welcome Admin!</span>
    </div>
</nav>

<div class="alert-box" id="alert">
    <div class="d-flex align-items-center justify-content-center h-100">
        <span id="alert-content">Success!!</span>
    </div>
</div>

<div class="d-flex">
    <div class="bg-gray p-3"> <!-- Left Navigation (eventually need to become an include)-->
        <span>Left Nav, currently empty</span>
    </div>

    <div class="flex-grow-1 p-3">
        <?
        ini_set('display_errors', 1);
        error_reporting(E_ALL & ~E_NOTICE);

        $path = 'http://api.ctrl-alt-delete.greenriverdev.com/v1/admin/search.php?';

        $headers = array(
            'Content-type: application/x-www-form-urlencoded'
        );
        $curl = curl_init($path);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);

        $data = json_decode($result);


        if($httpcode == 200){
            $placeholderImagePath = '/images/placeholder.png';

            foreach($data as $obj){
                $row = get_object_vars($obj);

                $id = $row['id'];
                $name = $row['company_name'];
                $category = $row['category_name'];
                $state = $row['state'];
                $country = $row['country'];
                $about = $row['about'];
                $url = $row['url'];
                $logo_path = $row['logo_path'];
                $icon_path = $row['category_icon_path'];


                $location = "";
                if(!empty($state)){
                    $location .= $state;
                }
                if(!empty($country)){
                    if(!empty($state)){
                        $location .= ", ";
                    }
                    $location .= $country;
                }

                $imgPath = (!empty($logo_path)) ? $logo_path : $placeholderImagePath;

                //Parsing the url since its not standardized in the database (regex is my own creation (Dylan))
                preg_match('/(?:(?:http(?:s)?:\/\/)?(?:www\.)?)?(?<domain>[\w\.-]+){1}(?<path>.*)/', $url, $matches);
                $urlParsed = $matches['domain'].$matches['path'];

                echo "<div class='d-flex my-3' id='$id'>";
                    echo "<div class='media company-hoverable flex-grow-1' onclick='openModal($id)'>";
                    echo "<img src='$imgPath' class='mr-3 search-image'>";
                        echo "<div class='media-body row'>";
                        echo "<span class='col-6' span style='font-size:20px'>$name</span>";
                        echo "<span class='col-6'><svg class='nav-icon'><use href='$icon_path'></use></svg>$category</span>";
                        echo "<span class='col-6'>Service</span>";
                        echo "<span class='col-6'>$location</span>";
                        echo "<span class='col-12 mt-3'>$about</span>";
                        echo "</div>";
                    echo "</div>";

                    echo "<div class='d-flex align-items-center justify-content-around flex-column'>
                        <svg class='button accept'
                             onclick='acceptCompany($id)'>
                            <use href='/images/symbol-defs.svg#button-accept'></use>
                        </svg>
                        <svg class='button cancel'
                             onclick='rejectCompany($id)'>
                            <use href='/images/symbol-defs.svg#button-cancel'></use>
                        </svg>
                    </div>";
                echo "</div> <hr>";
            }
        } else {
            echo "<h3>".$data->message."</h3>";
        }

        ?>
    </div>

    <div class="bg-gray p-3"> <!-- Right Navigation (eventually needs to become an include) -->
        <span>Right Nav, current empty</span>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>

</body>
</html>
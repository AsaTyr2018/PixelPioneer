<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PixelPioneer Gallery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
<style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 0;
            background-color: #121212;
            color: #fff;
            font-family: Arial, sans-serif;
        }

#bannerHeader {
    width: 100%;
    height: 350px;
    display: flex; 
    align-items: center; 
    justify-content: center; 
    overflow: hidden;
}

.banner-image {
    width: 1024px; 
    height: 350px;
    background-size: cover;
    background-position: center;
    opacity: 0;
    transition: opacity 2s ease-in-out;
}

        .banner-image.active {
            opacity: 1;
        }
        .search-form {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        .gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
        }

        .category {
            width: 200px;
            border-radius: 15px;
            overflow: hidden;
            position: relative;
        }

        .category img {
            width: 100%;
        }

        .category .label {
            position: absolute;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            color: #fff;
            width: 100%;
            text-align: center;
            padding: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<header id="bannerHeader">
    <!-- Dynamically add image containers here -->
</header>

<div class="search-form">
    <form action="index-gl.php" method="get">
        <input type="text" name="search" placeholder="Search...">
        <select name="artist">
            <option value="">Artists</option>
            <?php
            $dir = "content_gl/"; // Path to the image directory
            $artists = [];
            $categories = glob($dir . '*', GLOB_ONLYDIR);
            foreach ($categories as $category) {
                $categoryName = basename($category);
                $parts = explode('-', $categoryName);
                $artistName = $parts[0];
                if (!in_array($artistName, $artists)) {
                    $artists[] = $artistName;
                    echo "<option value=\"$artistName\">$artistName</option>";
                }
            }
            ?>
        </select>
        <button type="submit">Filter</button>
    </form>
</div>

<div class="gallery">
    <?php
    $dir = "content_gl/"; // Image directory

    if (isset($_GET['search']) && $_GET['search'] != '') {
        $search_term = strtolower($_GET['search']);
        $found_files = [];
        foreach ($categories as $category) {
            $files = glob($category . '/*.{jpg,jpeg,png}', GLOB_BRACE);
            foreach ($files as $file) {
                if (strpos(strtolower($file), $search_term) !== false) {
                    $found_files[] = $file;
                }
            }
        }
        foreach ($found_files as $file) {
            $category_name = basename(dirname($file));
            echo '<div class="category">';
            echo '<a href="' . $file . '" data-lightbox="gallery" data-title="' . $category_name . '">';
            echo '<img src="' . $file . '" alt="' . $category_name . '" />';
            echo '</a>';
            echo '<div class="label">' . $category_name . '</div>';
            echo '</div>';
        }
    } elseif (isset($_GET['artist']) && $_GET['artist'] != '') {
        $selected_artist = $_GET['artist'];
        foreach ($categories as $category) {
            $categoryName = basename($category);
            $parts = explode('-', $categoryName);
            $artistName = $parts[0];
            if ($artistName === $selected_artist) {
                $files = glob($category . '/*.{jpg,jpeg,png}', GLOB_BRACE);
                foreach ($files as $file) {
                    echo '<div class="category">';
                    echo '<a href="' . $file . '" data-lightbox="gallery" data-title="' . $categoryName . '">';
                    echo '<img src="' . $file . '" alt="' . $categoryName . '" />';
                    echo '</a>';
                    echo '<div class="label">' . $categoryName . '</div>';
                    echo '</div>';
                }
            }
        }
    } else {
        foreach ($categories as $category) {
            $files = glob($category . '/*.{jpg,jpeg,png}', GLOB_BRACE);
            if (count($files) > 0) {
                $random_image = $files[array_rand($files)];
                $category_name = basename($category);
                echo '<div class="category">';
                echo '<a href="' . $random_image . '" data-lightbox="gallery-' . $category_name . '" data-title="' . $category_name . '">';
                echo '<img src="' . $random_image . '" alt="' . $category_name . '" />';
                echo '</a>';
                echo '<div class="label" onclick="window.location.href=\'index-gl.php?category=' . urlencode($category_name) . '\'">' . $category_name . '</div>';
                echo '</div>';
            }
        }
    }
    ?>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox-plus-jquery.min.js"></script>

<script>
// JavaScript for Banner Slider
const bannerImages = ["./images/banner1.jpg", "./images/banner2.jpg", "./images/banner3.jpg", "./images/banner4.jpg", "./images/banner5.jpg", "./images/banner6.jpg", "./images/banner7.jpg", "./images/banner8.jpg", "./images/banner9.jpg", "./images/banner10.jpg"]; // Ihre Bildpfade
let currentImageIndex = 0;

function createImageElement(src) {
    const img = document.createElement('div');
    img.classList.add('banner-image');
    img.style.backgroundImage = `url(${src})`;
    return img;
}

function updateBannerImage() {
    const header = document.getElementById('bannerHeader');
    const images = header.getElementsByClassName('banner-image');
    const newActiveIndex = (currentImageIndex + 1) % bannerImages.length;

    images[newActiveIndex].classList.add('active');
    
    if (images[currentImageIndex]) {
        images[currentImageIndex].classList.remove('active');
    }

    currentImageIndex = newActiveIndex;
}

window.onload = () => {
    const header = document.getElementById('bannerHeader');
    
    bannerImages.forEach(src => {
        header.appendChild(createImageElement(src));
    });

    updateBannerImage();
    setInterval(updateBannerImage, 5000); 
};

</script>
</body>
</html>

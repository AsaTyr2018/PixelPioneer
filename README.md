# PixelPioneer Gallery Script

## About PixelPioneer

PixelPioneer is a user-friendly, stand-alone PHP script for creating an interactive and visually appealing online image gallery. It's designed to be simple and efficient, requiring no SQL or complex setup. Just upload the script and your images, and you're ready to go.

### Features

- **Artist-Centric Navigation**: Browse artworks by selecting an artist from a dropdown menu.
- **Keyword Search**: Easily find specific pieces or themes within the gallery.
- **Randomized Display**: View a random selection of images when no specific criteria are selected.
- **Dynamic Banner Display**: Highlight featured images or artists with a rotating banner at the top of the page.
- **No SQL Required**: Runs without a database, making it easy to set up and maintain.
- **Out of the Box**: Single-file script for easy installation and use.

## Prerequisites

- Web server with PHP support (e.g., Apache, Nginx)
- PHP 7.x or higher

## Installation

1. **Clone/Download the Repository**

   ```bash
   git clone https://github.com/AsaTyr2018/PixelPioneer/PixelPioneer.git
   ```

2. **Create Directory Structure**

   Create a `content_gl` folder in the script's main directory for the image categories.

   ```
   /content_gl
   ├── artist1
   │   ├── image1.jpg
   │   ├── image2.jpg
   │   └── ...
   ├── artist2
   │   ├── image1.jpg
   │   ├── image2.jpg
   │   └── ...
   └── ...
   ```

3. **Configure Banner Images**

   Update the `bannerImages` array in the script's JavaScript section with your banner images' paths.

   ```javascript
   const bannerImages = [
       "./images/banner1.jpg",
       "./images/banner2.jpg",
       // Add more images as needed
   ];
   ```

4. **Customization**

   Tailor the CSS and script settings to your design and functionality needs.

## Usage

- Open the gallery in a web browser.
- Filter artworks by artist or search for specific themes.
- Enjoy the dynamic banner displaying rotating images.

## User Experience Highlights

- **Simple, Intuitive Interface**: Ensures a seamless browsing experience.
- **Responsive Design**: Works flawlessly on desktop and mobile devices.
- **Visually Engaging**: Organized and attractive presentation of artwork.
- **Featured Banner**: Adds a dynamic element to the gallery.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Contributors

- Asatyr2018

---

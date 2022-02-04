const lightbox = document.getElementById('lightbox');

//array of images from div containing all the images
const images = document.getElementsByClassName('portImg')

const closeIcon = document.getElementById('close');

//navigation arrows
const prev = document.getElementById('prev');
const next = document.getElementById('next');


//opens lightbox
function openLightBox()
{
    lightbox.classList.add('active');
}

//closes lightbox
function closeLightBox()
{
    lightbox.classList.remove('active');
}


//default image index starts at 0
index = 0;
display(index);


//displays image in the lightbox based on its index
function currentImg(n)
{
    display(index = n);
}

//changes which image is display by incrementing(next) or decrementing(prev) index
function changeImg(n)
{
    display(index += n);
}



function display(n)
{

    const activeImg = document.getElementById('activeImg'); //div for image being displayed

    if(n >= images.length) 
    {
        index = 0; //first image in array displayed if the end of array is reached
    }

    if(n < 0)
    {
        index = images.length - 1; //last image in array displayed if the start of array is reached
    }

    activeImg.src = images[index].src;
    activeImg.alt = images[index].alt;
    activeImg.classList.add('selected');
    lightbox.appendChild(activeImg);

}


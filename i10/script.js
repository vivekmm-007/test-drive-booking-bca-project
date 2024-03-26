window.addEventListener('scroll', function() {
    const image = document.querySelector('.image');
    const keySpecification = document.querySelector('.keyspecification');
    const scrollY = window.scrollY;

    
    const moveDownThreshold = 200; 

    
    let imageTranslateY = 0;

    if (scrollY < moveDownThreshold) {
       
        imageTranslateY = scrollY + 'px';
    } else {
        
        imageTranslateY = moveDownThreshold + 'px';
    }

    image.style.transform = `translateY(${imageTranslateY})`;

    
    const textOpacity = 1 - scrollY / 500; 
    keySpecification.style.opacity = textOpacity;
});

<?php
include 'bdd.php';
?>

<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script>
const url = "livres/<?=$row['link']?>";
let barProgress = document.querySelector('div.progress-bar');

let pdfDoc = null,
    pageNum = 1,
    pageIsRendering = false,
    pageNumIsPending = null;

const scale = 1.1,
    canvas = document.querySelector('#pdf-render'),
    ctx = canvas.getContext('2d');

const renderPage = num => {
    pageIsRendering = true;

    pdfDoc.getPage(num).then(page =>{
        const viewport = page.getViewport({scale});
        canvas.height = viewport.height;
        canvas.width = viewport.width;

        const renderCtx = {
            canvasContext: ctx,
            viewport
        }
        page.render(renderCtx).promise.then(() => {
            pageIsRendering = false;

            if(pageNumIsPending !== null){
                renderPage(pageNumIsPending);
                pageNumIsPending = null;
            }
        });

        //AJAX
        /*let mydata = {number : num};
        console.log(mydata);*/
        $.ajax({
            url: 'response.php',
            type: 'POST',
            data: {mydata : num},
            success: function(data){ 
            $('#result').html(data);
            console.log("ok")
            } 
        });
        
        //Output current page
        //console.log(num);
        document.querySelector('#page-num').textContent = num;
        barProgress.textContent = Math.round(num/pdfDoc.numPages*100)+"%";
        barProgress.style.width = Math.round(num/pdfDoc.numPages*100)+"%";
    })
}

//Check for pages rendering
const queueRenderPage = num => {
    if(pageIsRendering){
        pageNumIsPending = num;
    }else{
        renderPage(num);
    }
}

//Affiche la page précédete
const showPrevPage = () => {
    if(pageNum <=1){
        return;
    }
    pageNum--;
    queueRenderPage(pageNum);
}

//Affiche la page suivante
const showNextPage = () => {
    if(pageNum >= pdfDoc.numPages){
        return;
    }
    pageNum++;
    queueRenderPage(pageNum);
}

//Get document
pdfjsLib.getDocument(url).promise.then(pdfDoc_ => {
    pdfDoc = pdfDoc_;
    document.querySelector('#page-count').textContent = pdfDoc.numPages;
    renderPage(pageNum);
});

//Button events
document.querySelector('#prev-page').addEventListener('click', showPrevPage);
document.querySelector('#next-page').addEventListener('click', showNextPage);


</script>


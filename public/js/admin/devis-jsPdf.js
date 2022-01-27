(function($) {
    $('.btnDevisToPdf').on('click', function(){
        // var doc = new jsPDF();
        // var elementHTML = $('#devisToPdf').html();
    
        // doc.fromHTML(elementHTML, 15, 15, {
        //     'width': 170
        // });
        
        // // Save the PDF
        // doc.save('devisToPdf.pdf');
        doc = document.getElementById('devisToPdf');
        html2canvas(doc).then(function (canvas) {
            var img = canvas.toDataURL("image/png");
            var doc = new jsPDF({
                orientation: 'landscape',
            });
            const imgProps= doc.getImageProperties(img);
            const pdfWidth = doc.internal.pageSize.getWidth();
            const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;
            doc.addImage(img, 'PNG', 0, 0, pdfWidth, pdfHeight);

            // doc.addImage(img, 'JPEG', 10, 10);
            doc.save('test.pdf');        
        });
    })
})(jQuery);
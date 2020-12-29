'use strict'

let fs = require('fs'),
PDFParser = require("pdf2json");
const { listenerCount } = require('process');

let pdfParser = new PDFParser();

pdfParser.on("pdfParser_dataError", errData => console.error(errData.parserError) );
pdfParser.on("pdfParser_dataReady", pdfData => {
    let filename = `C:/Users/olivier.thas/LaravelProjects/insuraquest/insuraquest/insuraquest/public/docs/test.json`;
    
    let content = '{"body":"';
    //let firstLine = pdfData.formImage.Pages[0].Texts[0].R[0].T;
    let arrayOfLines = pdfData.formImage.Pages[0].Texts;//om enkel de array op te halen
    for(let obj of arrayOfLines) {
        content += (obj.R[0].T + "\\n");
        //content.concat(obj.R[0].T, "\n");
    }
    content += '"}';
    //content.replace(/\n/g, "\\n");

    fs.writeFile(filename, decodeURI(content), (err) => {
        if(err) {
            console.log(`Error: ${err}`)
        } else {
            console.log(`file created`);
        }
        });
});

pdfParser.loadPDF("C:/Users/olivier.thas/Downloads/Bewijslast in verzekeringen - standpunt FSMA.pdf");

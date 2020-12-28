'use strict'

let fs = require('fs'),
PDFParser = require("pdf2json");

let pdfParser = new PDFParser();

pdfParser.on("pdfParser_dataError", errData => console.error(errData.parserError) );
pdfParser.on("pdfParser_dataReady", pdfData => {
fs.writeFile("C:/Users/olivier.thas/Downloads/Bewijslast in verzekeringen - standpunt FSMA.json", 
JSON.stringify(pdfData), (err) => {
    if(err) {
        console.log(`Error: ${err}`)
    } else {
        console.log(`file created`);
    }
    });
});

pdfParser.loadPDF("C:/Users/olivier.thas/Downloads/Bewijslast in verzekeringen - standpunt FSMA.pdf");

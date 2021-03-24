<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use mikehaertl\pdftk\Pdf;
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;
// use tmw\fpdm\fpdm;

Route::get('/', function () {

    $array = [
        'Recipient Name please print' => 'Devat Karetha',
        'Preferred Name' => 'DEKTS',
        'DOB' => '15 APRIL 2021',
        'Text1' => 'M', // Current Gender ID
        'Text2' => 'M', // Sex Assigned at Birth
        'Text3' => 'M', // Marital Status
        'Address City State Zip' => 'J-104, Stavan Parishray, Ahmedabad, Gujarat - 382481',
        'Email Address' => 'devat73@gmail.com',
        'ParentGuardian Surrogate if applicable please print' => 'Bhikhabhai',
        'Phone' => '+91 8320354276',
        'Preferred Language' => 'English',
        'Text4' => 'UNK', // Ethnicity
        'Text5' => 'ASN', // Race
        'Primary Insurance Name' => 'John Dream',
        'Primary Insurance ID' => 'HGF6545',
        'Subscriber NameDOB' => '10 JUNE 2000',
        'Subscriber Relation to Patient' => 'Father',
        'Primary Insurance Address' => 'Goa FR 007',
        'Primary Insurance Group' => 'FIRST',
        'Primary Insurance Phone' => '9898989898',
        'Secondary Insurance Name' => 'Doe Dream',
        'Secondary Insurance ID' => 'TFRY878',
        'Subscriber NameDOB_2' => '31 MARCH 1983',
        'Subscriber Relation to Patient_2' => 'Mother',
        'Secondary Insurance Address' => 'Mumbai  IN 001',
        'Secondary Insurance Group' => 'SECOND',
        'Secondary Insurance Phone' => '8787878787',
        'ClinicOffice Site Where Vaccine is Administered' => 'Ahmedabad',
        'Primary Care Physician AddressPhone Number' => '8888888888',
        'Are you feeling sick today Are you feeling sick today' => 'Having some fever',
        'undefined' => 'On', // This one is for YES // Off // 1
        'Yes' => 'On', // This one is for NO // Off // 1
        'No No' => 'Unknown Text', // This is 3rd text box // 1
        'In the last 10 days have you had a COVID19 test or been told by ahealthcare provider' => 'On', // This one is for YES // Off // 2
        'Yes_2' => 'Yes_3', // This one is for NO // Off // 2 // Conflict on No 5
        'No' => 'No_2', // This one is for Unknown // Off // 2 // Conflict on No 3
        'screening_questionnaire_3_date' => '24 March 2021', // This is for date // 3
        'In the last 14 days have been told by a healthcare provider or healthdepartment to' => 'On', // This one is for YES // Off // 3
        'Yes_5' => 'On', // This one is for NO // Off // 3
        'No' => 'No_3', // This one is for Unknown // Off // 3 // Conflict on No 2
        'Have you been treated wit antibody therapy for COVID19 in the past 90 days 3' => 'On', // This one is for YES // Off // 4
        'Yes_6' => 'On', // This one is for NO // Off // 4
        'No_4' => 'On', // This one is for Unknown // Off // 4
        'Have you ever had a serious or l fethreatening allergic reaction such ashives or' => 'On', // This one is for YES // Off // 5
        'Yes_2' => 'Yes_4', // This one is for NO // Off // 5 // Conflict on No 2
        'No_5' => 'On', // This one is for Unknown // Off // 5
        'Have you had any vaccines in the past 14 days 2 weeks including flu shot' => '15 January 2021',
        'Check Box6' => 'Yes', // This one is for YES // Off // 6
        'Check Box7' => 'Yes', // This one is for No // Off // 6
        'Check Box8' => 'Yes', // This one is for Unknown // Off // 6
        'Check Box15' => 'Yes', // This one is for YES // Off // 7
        'Check Box16' => 'Yes', // This one is for No // Off // 7
        'Check Box17' => 'Yes', // This one is for Unknown // Off // 7
        'Check Box18' => 'Yes', // This one is for Yes // Off // 8
        'Check Box19' => 'Yes', // This one is for No // Off // 8
        'Check Box20' => 'Yes', // This one is for Unknown // Off // 8
        'Check Box9' => 'Yes', // This one is for YES // Off // 9
        'Check Box10' => 'Yes', // This one is for No // Off // 9
        'Check Box11' => 'Yes', // This one is for Unknown // Off // 9
        'Check Box12' => 'Yes', // This one is for Moderna // Off // 10
        'Check Box13' => 'Yes', // This one is for Pfizer // Off // 10
        'Check Box21' => 'Yes', // This one is for No // Off // 10
        'Text22' => '20 March 2021', // Date // 10
        'Signature23_es_:signer:signature' => 'Devat K', // Recipient/Surrogate/Guardian (Signature) recipient
        'Text27' => '20 March 2021 12:25 PM', // Date / Time
        'Text25' => 'Devat Karetha', // Print Name 
        'Text29' => 'Son', // Relationship to Patient (if other than recipient)
        'Text26' => '54354153135435', // Telephonic Interpreter’s ID #
        'Text28' => '20 March 2021 12:25 PM', // Date / Time
        'Signature24_es_:signer:signature' => 'John Doe', // Signature: Interpreter
        'Text30' => '20 March 2021 12:25 PM', // Date / Time
        'Text31' => 'John Doe - Grand Father', // Print: Interpreter’s Name and Relationship to Patient
        // 'checkbox_2lyxf' => 'Yes', // This one is for YES // Off
        'checkbox_1fdkz' => 'Yes', // This one is for YES // Off // Pfizer/ BioNTech First Dose
        'checkbox_2hxxe' => 'Yes', // This one is for YES // Off // Moderna Second Dose
        'checkbox_3uozf' => 'Yes', // This one is for YES // Off // Astra-Zeneca Second Dose
        'checkbox_5xmoy' => 'Yes', // This one is for YES // Off // Moderna First Dose
        'checkbox_6fwmp' => 'Yes', // This one is for YES // Off // Astra-Zeneca First Dose
        'checkbox_7bpxo' => 'Yes', // This one is for YES // Off // Johnson and Johnson Single Dose
        'checkbox_8ninp' => 'Yes', // This one is for YES // Off // Administration site Left Deltoid
        'checkbox_9gdkh' => 'Yes', // This one is for YES // Off // Administration site Right Deltoid
        'checkbox_2wskb' => 'Yes', // This one is for YES // Off // Pfizer/ BioNTech Second Dose
        'checkbox_3krou' => 'Yes', // This one is for YES // Off // Dosage 0.5 ml
        'checkbox_4tgek' => 'Yes', // This one is for YES // Off // Dosage 0.3 ml
        'checkbox_5xvle' => 'Yes', // This one is for YES // Off // Administration site Left Thigh
        'checkbox_6gclp' => 'Yes', // This one is for YES // Off // Administration site Right Thigh
        'checkbox_7pklo' => 'Yes', // This one is for YES // Off // I have provided the patient (and/or parent, guardian or surrogate, as applicable) with information about the vaccine and consent to vaccination was obtained.
        'text_8pebg' => '23 March 2021', // This is for Pfizer/BioNTech EUA Fact Sheet Date
        'text_9xgnx' => '23 March 2021', // This is for Moderna EUA Fact Sheet Date
        'text_10xapu' => '23 March 2021', // This is for Astra-Zeneca EUA Fact Sheet Date
        'text_11rtvn' => '23 March 2021', // This is for Johnson and Johnson EUA Fact Sheet Date
        'text_12marw' => '0000', // This is for Pfizer/BioNTech Manufacturer & Lot Number
        'text_13shwt' => '1111', // This is for Moderna Manufacturer & Lot Number
        'text_14lpjm' => '2222', // This is for Astra-Zeneca Manufacturer & Lot Number
        'text_15ekxh' => '3333', // This is for Johnson and Johnson Manufacturer & Lot Number
    ];

    $pdf = new Pdf(public_path('pdf\vaccine-consent-form-new.pdf'), [
        // 'command' => '/some/other/path/to/pdftk',
        // or on most Windows systems:
        'command' => 'C:\Program Files (x86)\PDFtk\bin\pdftk.exe',
        'useExec' => true,  // May help on Windows systems if execution fails
    ]);
    $time = time();
    $result = $pdf
    ->fillForm($array)
        // ->getDataFields();           // Get all the input field names
        // ->allow('AllFeatures')      // Change permissions
        // ->flatten()                 // Merge form data into document (doesn't work well with UTF-8!)
        // ->compress($value)          // Compress/Uncompress
        // ->keepId('first')           // Keep first/last Id of combined files
        // ->dropXfa()                 // Drop newer XFA form from PDF
        // ->dropXmp()                 // Drop newer XMP data from PDF
        // ->needAppearances()         // Make clients create appearance for form fields
        // ->setPassword($pw)          // Set owner password
        // ->setUserPassword($pw)      // Set user password
        // ->passwordEncryption(128)   // Set password encryption strength
        ->saveAs(public_path('/pdf/'.$time.'.pdf'));
    // ->send('new.pdf');
    if ($result === false) {
        $error = $pdf->getError();
    }

    // generatePDF(public_path("pdf/".$time.".pdf"), "export.pdf", "Hello world", public_path("img/31060232.jpg"));

    newPdf(public_path("pdf/".$time.".pdf"), "export.pdf", "Hello world", public_path("img/31060232.jpg"), $array);

    // $pdf = new FPDI('P', 'mm', 'A4'); //FPDI extends TCPDF

    // $pdf->setSourceFile(public_path("pdf/".$time.".pdf"));

    /*
    NOTES:
     - To create self-signed signature: openssl req -x509 -nodes -days 365000 -newkey rsa:1024 -keyout tcpdf.crt -out tcpdf.crt
     - To export crt to p12: openssl pkcs12 -export -in tcpdf.crt -out tcpdf.p12
     - To convert pfx certificate to pem: openssl pkcs12 -in tcpdf.pfx -out tcpdf.crt -nodes
    */

    // $certificate = 'file://img/45.jpg';

    // set additional information
    // $info = array(
    //     'Name' => 'TCPDF',
    //     'Location' => 'Office',
    //     'Reason' => 'Testing TCPDF',
    //     'ContactInfo' => 'http://www.tcpdf.org',
    //     );

    // for ($i = 1; $i <= $pages; $i++)
    //     {
    //         $pdf->AddPage();
    //         $page = $pdf->importPage($i);
    //         $pdf->useTemplate($page, 0, 0);
// $pdf->writeHTML('<img src="http://chart.googleapis.com/chart?cht=p3&chd=t:60,40&chs=250x100&chl=Hello|World" />', true, false, false, false, '');

            // $pdf->Image('http://chart.googleapis.com/chart?cht=p3&chd=t:60,40&chs=250x100&chl=Hello|World',60,30,90,0,'PNG');
            // $pdf->Output();


            // set document signature
            // $pdf->setSignature($certificate, $certificate, 'tcpdfdemo', '', 2, null);      

    // }

    echo "<pre>";
    print_r(json_encode(json_decode(json_encode($result), true)));
    echo "</pre>";
    die;








    // dd(public_path('pdf\vaccine-consent-form.pdf'));
    $pdf = new Pdf(public_path('pdf\vaccine-consent-form.pdf'), [
        // 'command' => '/some/other/path/to/pdftk',
        // or on most Windows systems:
        'command' => 'C:\Program Files (x86)\PDFtk\bin\pdftk.exe',
        'useExec' => true,  // May help on Windows systems if execution fails
    ]);

    $result = $pdf->fillForm(['name' => 'My Name'])->saveAs(public_path('/pdf/new.pdf'));
    if ($result === false) {
        $error = $pdf->getError();
    }
    // $content = file_get_contents( (string) $pdf->getTmpFile() );
    dd($result);
    $data = $pdf->getData();
    if ($data === false) {
        $error = $pdf->getError();
        // dd($error);
    }
    dd($data);
    // return view('welcome');
});


function generatePDF($source, $output, $text, $image) {
 
    $pdf = new FPDI('Portrait','mm',array(215.9,279.4)); // Array sets the X, Y dimensions in mm
    $pdf->AddPage();
    $pagecount = $pdf->setSourceFile($source);
    $tppl = $pdf->importPage(1);
     
    $pdf->useTemplate($tppl, 10, 10, 10, 10);
     
    $pdf->Image($image,10,10,50,50); // X start, Y start, X width, Y width in mm
     
    $pdf->SetFont('Helvetica','',10); // Font Name, Font Style (eg. 'B' for Bold), Font Size
    $pdf->SetTextColor(0,0,0); // RGB 
    $pdf->SetXY(51.5, 57); // X start, Y start in mm
    $pdf->Write(0, $text);
     
    $pdf->Output($output, "F");
}

function newPdf($source, $output, $text, $image, $array) {
    $pdf = new Fpdi('Portrait','mm',array(215.9,279.4));

    $pageCount = $pdf->setSourceFile($source);
    $pageId = $pdf->importPage(2, PdfReader\PageBoundaries::MEDIA_BOX);

    $pdf->addPage();
    $pdf->Image($image,10,100,10,10);
    $pdf->useImportedPage($pageId, 0, 0, 208);

    $pdf->Output($output, "F");

    // $pdf->Output('I', $output);

    $pdf = new \FPDM(public_path('export.pdf'));
    $pdf->Load($array, false);
    $pdf->Merge();
    $pdf->Output("export.pdf", 'F');
}
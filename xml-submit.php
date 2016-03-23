<!DOCTYPE html>
    <html lang="en">
<body>

<?php
/**
 * Created by PhpStorm.
 * @author Zachary Hughes <zhughes3@gmail.com>
 * Date: 3/22/2016
 * Time: 2:26 PM
 * Description: Something is wrong here.
 */

// define variables and set to empty values
$date = $location = $title = $subjects = "";
$intervieweeName = $intervieweeChangedName = $occupation = $intervieweeRace = $intervieweeGender = "";
$interviewerName = $interviewerRace = $interviewerGender = "";
$reviserName = $reviserRace = $reviserGender = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = test_input($_POST["date"]);
    $location = test_input($_POST["location"]);
    $title = test_input($_POST["title"]);
    $subjects = test_input($_POST["subjects"]);

    $intervieweeName = test_input($_POST["intervieweeName"]);
    $intervieweeChangedName = test_input($_POST["intervieweeChangedName"]);
    $occupation = test_input($_POST["occupation"]);
    $intervieweeRace = test_input($_POST["intervieweeRace"]);
    $intervieweeGender = test_input($_POST["intervieweeGender"]);

    $interviewerName = test_input($_POST["interviewerName"]);
    $interviewerRace = test_input($_POST["interviewerRace"]);
    $interviewerGender = test_input($_POST["interviewerGender"]);

    $reviserName = test_input($_POST["reviserName"]);
    $reviserRace = test_input($_POST["reviserRace"]);
    $reviserGender = test_input($_POST["reviserGender"]);
}

//Write XML
$xmlString = <<<XML
<?xml version = "1.0" encoding = "UTF-8"?>

<TEI xmlns = "http://www.tei-c.org/ns/1.0">
	<teiHeader>
	    <dateOfFirstInterview> $date </dateOfFirstInterview>
	    <locationOfInterview> $location </locationOfInterview>
	    <nameOfInterviewee> $intervieweeName </nameOfInterviewee>
	    <changedNameOfInterviewee> $intervieweeChangedName </changedNameOfInterviewee>
	    <occupation> $occupation </occupation>
	    <gender> $intervieweeGender </gender>
	    <raceOfInterviewee> $intervieweeRace </raceOfInterviewee>
	    <interviewer> $interviewerName </interviewer>
	    <raceOfInterviewer> $interviewerRace </raceOfInterviewer>
	    <genderOfInterviewer> $interviewerGender </genderOfInterviewer>
	    <revisers> $reviserName </revisers>
	    <raceOfRevisers> $reviserRace </raceOfRevisers>
	    <genderOfReviser> $reviserGender </genderOfReviser>
	    <titleOfLifeHistory> $title </titleOfLifeHistory>
	    <subjects> $subjects </subjects>
	</teiHeader>
</TEI>

XML;

//this would save the file to server
//file_put_contents("myxmlfile.xml", $xmlString);

//force download of xml
header('Content-Disposition: attachment; filename="myxmlfile.xml"');
header('Content-Type: text/plain'); # Don't use application/force-download - it's not a real MIME type, and the Content-Disposition header is sufficient
header('Content-Length: ' . strlen($xmlString));
header('Connection: close');

echo $xmlString;

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

 ?>

</body>

</html>
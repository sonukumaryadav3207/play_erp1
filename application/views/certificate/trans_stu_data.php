<style>
	span {
		color: red;
	}
</style>
<?php
error_reporting(0);
if ($student) {
	$ADM_NO = $student->ADM_NO;
	$BIRTH_DT = $student->BIRTH_DT;
	$FIRST_NM = $student->FIRST_NM;
	$BLOOD_GRP = $student->BLOOD_GRP;
	$NATION = $student->NATION;
	$MOTHER_NM = $student->MOTHER_NM;
	$FATHER_NM = $student->FATHER_NM;
	$CAT_ABBR = $student->CAT_ABBR;
	$CORR_ADD = $student->CORR_ADD;
	$ADM_CLASSS = $student->ADM_CLASSS;
	$DISP_CLASS = $student->DISP_CLASS;
	$CBSE_REG = $student->CBSE_REG;
	$CBSE_ROLL = $student->CBSE_ROLL;
	$ADM_DATE = $student->ADM_DATE;
	$SUBJECT1 = $student->SUBJECT1;
	$SUBJECT2 = $student->SUBJECT2;
	$SUBJECT3 = $student->SUBJECT3;
	$SUBJECT4 = $student->SUBJECT4;
	$SUBJECT5 = $student->SUBJECT5;
	$SUBJECT6 = $student->SUBJECT6;
	$dob = date("d-M-Y", strtotime($BIRTH_DT));
	$adm_no1 = date("d-M-Y", strtotime($ADM_DATE));
	$dob_exp = explode("-", $BIRTH_DT);
	$year = $dob_exp[0];
	$day = $dob_exp[2];
	$mont_alpha = date('F', strtotime($dob));
}
if ($school_setting) {
	$school_name = $school_setting[0]->School_Name;
}

$number = $year;
$no = round($number);
$point = round($number - $no, 2) * 100;
$hundred = null;
$digits_1 = strlen($no);
$i = 0;
$str = array();
$words = array(
	'0' => '', '1' => 'One', '2' => 'Two',
	'3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
	'7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
	'10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
	'13' => 'Thirteen', '14' => 'Fourteen',
	'15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
	'18' => 'Eighteen', '19' => 'Nineteen', '20' => 'Twenty',
	'30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
	'60' => 'Sixty', '70' => 'Seventy',
	'80' => 'Eighty', '90' => 'Ninety'
);
$digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
while ($i < $digits_1) {
	$divider = ($i == 2) ? 10 : 100;
	$number = floor($no % $divider);
	$no = floor($no / $divider);
	$i += ($divider == 10) ? 1 : 2;
	if ($number) {
		$plural = (($counter = count($str)) && $number > 9) ? '' : null;
		$hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
		$str[] = ($number < 21) ? $words[$number] .
			" " . $digits[$counter] . $plural . " " . $hundred
			:
			$words[floor($number / 10) * 10]
			. " " . $words[$number % 10] . " "
			. $digits[$counter] . $plural . " " . $hundred;
	} else $str[] = null;
}
$str = array_reverse($str);
$result = implode('', $str);
$points = ($point) ?
	"." . $words[$point / 10] . " " .
	$words[$point = $point % 10] : '';
$amtinword = $result/* . $points . " Paise" */;

//----------------------------//
$numbers = $day;
$nos = round($numbers);
$points = round($numbers - $nos, 2) * 100;
$hundreds = null;
$digits_1s = strlen($nos);
$is = 0;
$strs = array();
$wordss = array(
	'0' => '', '1' => 'One', '2' => 'Two',
	'3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
	'7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
	'10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
	'13' => 'Thirteen', '14' => 'Fourteen',
	'15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
	'18' => 'Eighteen', '19' => 'Nineteen', '20' => 'Twenty',
	'30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
	'60' => 'Sixty', '70' => 'Seventy',
	'80' => 'Eighty', '90' => 'Ninety'
);
$digitss = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
while ($is < $digits_1s) {
	$dividers = ($is == 2) ? 10 : 100;
	$numbers = floor($nos % $dividers);
	$nos = floor($nos / $dividers);
	$is += ($dividers == 10) ? 1 : 2;
	if ($numbers) {
		$plurals = (($counters = count($strs)) && $numbers > 9) ? 's' : null;
		$hundreds = ($counters == 1 && $strs[0]) ? ' and ' : null;
		$strs[] = ($numbers < 21) ? $wordss[$numbers] .
			" " . $digitss[$counters] . $plurals . " " . $hundreds
			:
			$wordss[floor($numbers / 10) * 10]
			. " " . $wordss[$numbers % 10] . " "
			. $digitss[$counters] . $plurals . " " . $hundreds;
	} else $strs[] = null;
}
$strs = array_reverse($strs);
$results = implode('', $strs);
$pointss = ($points) ?
	"." . $wordss[$points / 10] . " " .
	$wordss[$points = $points % 10] : '';
$amtinwords = $results;
//----------------------------//
$mont_alpha = $amtinwords . $mont_alpha . " " . $amtinword;
?>
<div class="row">
	<div class="col-md-12 col-sm-12 col-lg-12">
		<b style="font-size:22px; color:black;"><i>Student Details</i></b>
	</div>
</div><br />
<form action="<?php echo base_url('Transfer_certificate/tc_datafetch'); ?>" method="POST">
	<div class="row">
		<div class="col-sm-6 col-md-6 col-lg-6">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-lg-12 form-group">
					<label>Pupil's Name</label>
					<input type="hidden" value="<?php echo $ADM_NO; ?>" name="adm_no">
					<input type="text" name="nop" class="form-control" value="<?php echo $FIRST_NM; ?>" readonly>
					<input type="hidden" name="month_alpha_cnt" value="<?php echo $mont_alpha; ?>">
				</div>
				<div class="col-md-12 col-sm-12 col-lg-12 form-group">
					<label>Residence (Line1)</label>
					<input type="text" name="sb1" class="form-control" value="<?php echo $CORR_ADD; ?>">
				</div>
				<div class="col-md-12 col-sm-12 col-lg-12 form-group">
					<label>Admission Date</label>
					<input type="text" value="<?php echo $adm_no1; ?>" class="form-control" readonly>
					<input type="hidden" name="adm_date" value="<?php echo $ADM_DATE; ?>">
				</div>

			</div>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-lg-12 form-group">
					<label>Father's Name/Guardian's Name </label>
					<input type="text" name="f_name" value="<?php echo $FATHER_NM; ?>" class="form-control" readonly>
				</div>
				<div class="col-md-12 col-sm-12 col-lg-12 form-group">
					<label>Line2</label>
					<input name="sb2" type="text" class="form-control">
				</div>
				<div class="col-md-12 col-sm-12 col-lg-12 form-group">
					<label>Date of Birth</label>
					<input type="text" value="<?php echo $dob; ?>" class="form-control" readonly>
					<input type="hidden" name="BIRTH_DT" value="<?php echo $BIRTH_DT; ?>" class="form-control" readonly>
				</div>

			</div>
		</div>
		<div class="col-md-6 col-lg-6 col-sm-6 form-group">
			<label>Date of which she/he is leaving<span>*</span></label>
			<input type="date" name="applied_date" class="form-control" required>

		</div>
		<div class="col-md-6 col-lg-6 col-sm-6 form-group">
			<label>Class in which the pupil last studied in <span>*</span></label>
			<select class="form-control" id="cps" name="cps" required>
				<?php
				if ($class) {
					foreach ($class as $classkey) {
				?>
						<option <?php if ($DISP_CLASS == $classkey->CLASS_NM) {
									echo "selected";
								} ?> value="<?php echo $classkey->CLASS_NM; ?>"><?php echo $classkey->CLASS_NM; ?></option>
				<?php
					}
				}
				?>
			</select>
		</div>
		<div class="col-sm-6 col-md-6 col-lg-6 form-group">
			<label>School/Board Annual Examination Last Taken with Result<span>*</span></label>

			<input type="text" name="st1" class="form-control" value="PASSED" required>

		</div>


	</div>
	<div class="row">

		<div class="col-md-6 col-sm-6 col-lg-6 form-group">
			<label>General Conduct<span>*</span></label>
			<input type="text" name="general_conduct" class="form-control" value="GOOD" required>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 form-group">
			<label>Reasons for leaving School<span>*</span></label>
			<select name="rfl" id="rfl" required class="form-control">
				<option value="">Select Reasons</option>
				<?php
				if ($TC_REMARKS) {
					foreach ($TC_REMARKS as $TC_REMARKS_data) {
				?>
						<option value="<?php echo $TC_REMARKS_data->REMARKS; ?>"><?php echo $TC_REMARKS_data->REMARKS; ?></option>
				<?php
					}
				}
				?>
			</select>
		</div>

		<div class="col-md-6 col-sm-6 col-lg-6 form-group">
			<label>All sums due by him/her to the school have been paid<span>*</span></label>
			<select name="afcon" id="afcon" required class="form-control">
				<option value="Yes">Yes</option>
				<option value="No">No</option>
			</select>
		</div>
		<div class="col-md-6 col-sm-6 col-lg-6 form-group">
			<label>Date of Issue of Certificate<span>*</span></label>
			<input type="date" required name="issue_date" class="form-control" required>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<center><button class="btn btn-success"><i class="fa fa-save" aria-hidden="true"></i> SAVE & <i class="fa fa-print" aria-hidden="true"></i> PRINT</button></center>
		</div>
	</div>
</form>
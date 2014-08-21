<?php
/*
 * Database
 */
define('DB_HOST', 		'localhost');
define('DB_USERNAME', 	'root');
define('DB_PASSWORD', 	'root');
define('DB_NAME', 		'projectSpa');

/*
 * Global Connection
 */
$dbConn;
dbConnect();
function dbConnect() {
	global $dbConn;
	$dbConn = mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
	if($dbConn) {
		if(mysql_select_db(DB_NAME, $dbConn)) {
			// Initial
			mysql_query("SET NAMES UTF8", $dbConn);
		} else {
			throw new Exception('Cannot select database');
		}
	} else {
		throw new Exception('Cannot connect host');
	}
}
function dbClose() {
	global $dbConn;
	return mysql_close($dbConn);
}

/*
 * การใช้ตัวแปร $table
 * 1. keyFieldName = ชื่อ primary key
 * 2. keyFieldType = ชนิดของ primary key
 *		(1) = Auto number
 *		(2) = Char running เป็น pk ที่ขึ้นต้นด้วยตัวอักษรและตามด้วยตัวเลข โดยมีการ run ตัวเลขจากน้อยไปมาก เช่น T01, EMP00001 เป็นต้น
 *		(3) = Char running with year เหมือนกับชนิดที่ 2 แต่ลงท้ายด้วย ปี พ.ศ. เช่น OR00001/57, RE00001/57 เป็นต้น
 * 3. keyChar = ตัวอักษรที่ขึ้นต้นของ primary key เช่น ตาราง employees ขึ้นต้นด้วย EM ก็ให้ใส่ 'EM' เป็นต้น
 * 4. keyLength = ขนาดของ primary key ทั้งหมด (รวมตัวอักษร และ ปี พ.ศ. ด้วย) เช่น P01 มีขนาด 3, OR00001/57 มีขนาด 10 เป็นต้น
 * 5. fieldNameList = ชื่อฟิลด์ของตาราง ฝั่งซ้ายเป็นชื่อภาษาอังกฤษ ฝั่งขวาเป็นชื่อภาษาไทย
 *		- หากเป็นตารางที่ทำการ join เพื่อดึงฟิลด์จากตารางอื่นมาแสดง ก็ให้ใส่ชื่อฟิลด์นั้นด้วย เช่น ตาราง employees จะแสดง ชื่อตำแหน่ง (pos_name) ไม่ใช่ รหัสตำแหน่ง (pos_id) ดังนั้นจะต้องใส่ฟิลด์ pos_name แทนที่จะใส่ pos_id เป็นต้น
 */
 $table = array(
	'titles' => array(
		'keyFieldName'  => 'title_id',
		'keyFieldType'	=> 2,
		'keyChar'		=> 'T',
		'keyLength'		=> 3,
		'fieldNameList'	=> array(
				'title_id'		=> 'รหัสคำนำหน้าชื่อ',
				'title_name'	=> 'ชื่อคำนำหน้าชื่อ'
		)
	),
	'positions' => array(
		'keyFieldName'  => 'pos_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'P',
		'keyLength'		=> 3,
		'fieldNameList'	=> array(
				'pos_id'		=> 'รหัสตำแหน่ง',
				'pos_name'		=> 'ชื่อตำแหน่ง'
		)
	),
	'employees' => array(
		'keyFieldName'  => 'emp_id',
		'keyFieldType'	=> 2,
		'fieldNameList'	=> array(
				'emp_id'		=> 'รหัสพนักงาน',
				'title_name'	=> 'คำนำหน้า',
				'pos_name'		=> 'ตำแหน่ง',
				'emp_name'		=> 'ชื่อ',
				'emp_surname'	=> 'นามสกุล',
				'emp_addr'		=> 'ที่อยู่',
				'emp_tel'		=> 'เบอร์โทร',
				'emp_username'	=> 'Username',
				'emp_password'	=> 'Password',
				'emp_pic'		=> 'รูปภาพ'
		)
	),
	'units' => array(
		'keyFieldName'  => 'unit_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'U',
		'keyLength'		=> 3,
		'fieldNameList'	=> array(
				'unit_id'		=> 'รหัสหน่วยนับ',
				'unit_name'		=> 'ชื่อหน่วยนับ'
		)
	),
	'beds' => array(
		'keyFieldName'  => 'bed_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'BE',
		'keyLength'		=> 4,
		'fieldNameList'	=> array(
				'bed_id'		=> 'รหัสเตียงนวด',
				'room_name'		=> 'ชื่อห้องนวด',
				'bed_name'		=> 'ชื่อเตียงนวด'
		)
	),
	'bank_accounts' => array(
		'keyFieldName'  => 'bnkacc_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'BA',
		'keyLength'		=> 4,
		'fieldNameList'	=> array(
				'bnkacc_id'		=> 'รหัสบัญชีธนาคาร',
				'bnkacc_no'		=> 'เลขบัญชี',
				'bnkacc_name'		=> 'ชื่อบัญชี',
				'bnkacc_branch' => 'สาขา',
				'bnkacc_type' => 'ประเภทบัญชี'
		)
	),
	'rooms' => array(
		'keyFieldName'  => 'room_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'RM',
		'keyLength'		=> 4,
		'fieldNameList'	=> array(
				'room_id'		=> 'รหัสห้องนวด',
				'room_name'		=> 'ชื่อห้องนวด'	
		) 
	),
	'booking_status' => array(
		'keyFieldName'  => 'bkgstat_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'S',
		'keyLength'		=> 3,
		'fieldNameList'	=> array(
				'bkgstat_id'		=> 'รหัสสถานะการจอง',
				'bkgstat_name'		=> 'ชื่อสถานะการจอง'
			
		) 
	),
	'brands' => array(
		'keyFieldName'  => 'brand_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'BR',
		'keyLength'		=> 4,
		'fieldNameList'	=> array(
				'brand_id'		=> 'รหัสยี่ห้อ',
				'brand_name'	=> 'ชื่อยี่ห้อ'
			
		) 
	),
	'pay_types' => array(
		'keyFieldName'  => 'paytyp_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'PA',
		'keyLength'		=> 4,
		'fieldNameList'	=> array(
				'paytyp_id'		=> 'รหัสประเภทการชำระเงิน',
				'paytyp_name'	=> 'ชื่อประเภทการชำระเงิน'
			
		) 
	),
	'element_types' => array(
		'keyFieldName'  => 'eletyp_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'ET',
		'keyLength'		=> 4,
		'fieldNameList'	=> array(
				'eletyp_id'		=> 'รหัสประเภทธาตุ',
				'eletyp_name'	=> 'ชื่อประเภทธาตุ'
			
		) 
	),
	'product_types' => array(
		'keyFieldName'  => 'prdtyp_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'PT',
		'keyLength'		=> 4,
		'fieldNameList'	=> array(
				'prdtyp_id'		=> 'รหัสประเภทผลิตภัณฑ์',
				'prdtyp_name'	=> 'ชื่อประเภทผลิตภัณฑ์'
			
		) 
	),
	'order_types' => array(
		'keyFieldName'  => 'ordtyp_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'OT',
		'keyLength'		=> 3,
		'fieldNameList'	=> array(
				'ordtyp_id'		=> 'รหัสประเภทการสั่งซื้อผลิตภัณฑ์',
				'ordtyp_name'	=> 'ชื่อประเภทการสั่งซื้อผลิตภัณฑ์'
			
		) 
	),
	'service_list_types' => array(
		'keyFieldName'  => 'svltyp_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'ST',
		'keyLength'		=> 4,
		'fieldNameList'	=> array(
				'svltyp_id'		=> 'รหัสประเภทรายการบริการ',
				'svltyp_name'	=> 'ชื่อประเภทรายการบริการ'
			
		) 
	),
	'customer_types' => array(
		'keyFieldName'  => 'custype_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'CT',
		'keyLength'		=> 3,
		'fieldNameList'	=> array(
				'custype_id'		=> 'รหัสประเภทผู้ใช้บริการ',
				'custype_name'		=> 'ชื่อประเภทผู้ใช้บริการ'
			
		) 
	),
	'spa' => array(
		'keyFieldName'  => 'spa_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'SA',
		'keyLength'		=> 4,
		'fieldNameList'	=> array(
				'spa_id'	=> 'รหัสสปา',
				'spa_name'	=> 'ชื่อสปา',
				'spa_addr'  => 'ที่อยู่',
				'spa_tel'   => 'เบอร์โทรศัพท์',
				'spa_fax'   => 'แฟ็กซ์',
				'spa_logo'  => 'รูปภาพ'
		) 
	),
	'customers' => array(
		'keyFieldName'  => 'cus_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'CM',
		'keyLength'		=> 8,
		'fieldNameList'	=> array(
				'cus_id'	    => 'รหัสผู้ใช้บริการ',
				'custype_id'	=> 'ประเภทผู้ใช้บริการ',
				'title_id'      => 'คำนำหน้าชื่อ',
				'cus_name'      => 'ชื่อ',
				'cus_surname'   => 'นามสกุล',
				'cus_addr'      => 'ที่อยู่',
				'cus_tel'       => 'เบอร์โทรศัพท์',
				'cus_user'      => 'ชื่อผู้ใช้',
				'cus_pass'      => 'รหัสผ่าน',
				'cus_birthdate' => 'วันที่เกิด',
				'cus_registered_date'  => 'วันที่สมัคร',
				'cus_facebook'  => 'facebook',
				'cus_line_id'   => 'Line',
				'cus_email'     => 'E-mail' 
		) 
	),
	'service_lists' => array(
		'keyFieldName'  => 'svl_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'SL',
		'keyLength'		=> 5,
		'fieldNameList'	=> array(
				'svl_id'	    => 'รหัสผู้ใช้บริการ',
				'svltyp_id'	    => 'ประเภทรายการใช้บริการ',
				'svl_min'       => 'เวลาที่ใช้(นาที)',
				'svl_hr'        => 'เวลาที่ใช้(ชั่วโมง)',
				'svl_name'      => 'ชื่อรายการบริการ',
				'svl_price'     => 'ราคา(บาท)',
				'svl_commission'  => 'ค่าคอมมิชชั่น(บาท)',
				'svl_desc'      => 'คำอธิบาย',
				'svl_picture'   => 'รูปภาพ'
						
		) 
	),
	'packages' => array(
		'keyFieldName'  => 'pkg_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'PK',
		'keyLength'		=> 5,
		'fieldNameList'	=> array(
				'pkg_id'	    => 'รหัสแพ็คเกจ',
				'pkg_name'	    => 'ชื่อแพ็คเกจ',
				'pkg_start'     => 'วันที่เริ่มใช้',
				'pkg_stop'      => 'วันเวลาที่สิ้นสุด',
				'pkg_desc'      => 'คำอธิบาย',
				'pkg_price'     => 'ราคา(บาท)',
				'pkg_picture'   => 'รูปภาพ'
						
		) 
	),
	'package_service_lists' => array(
		'keyFieldName'  => 'pkgsvl_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'PS',
		'keyLength'		=> 8,
		'fieldNameList'	=> array(
				'pkgsvl_id'	    => 'รหัสรายการบริการที่จัดแพ็คเกจ',
				'svl_id'	    => 'รหัสรายการบริการ',
				'pkg_id'        => 'รหัสแพ็คเกจ'
				
		) 
	),
	'promotions' => array(
		'keyFieldName'  => 'prm_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'PM',
		'keyLength'		=> 6,
		'fieldNameList'	=> array(
				'prm_id'	      => 'รหัสโปรโมชั่น',
				'prm_name'	      => 'ชื่อโปรโมชั่น',
				'prm_use_ amount' => 'จำนวนครั้งที่ใช้บริการ',
				'prm_free_ amount'	  => 'จำนวนครั้งที่ฟรี',
				'prm_startdate'	      => 'วันที่เริ่มใช้',
				'prm_enddate'     => 'วันที่สิ้นสุด',
				'prm_picture'     => 'รูปภาพ'
		) 
	),
	'promotion_service_lists' => array(
		'keyFieldName'  => 'prmsvl_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'PL',
		'keyLength'		=> 8,
		'fieldNameList'	=> array(
				'prmsvl_id'	      => 'รหัสรายการบริการที่จัดโปรโมชั่น',
				'svl_id'	      => 'รหัสรายการบริการ',
				'prm_id'          => 'รหัสโปรโมชั่น',
				'prmsvl_start'	  => 'วันที่เริ่มใช้',
				'prmsvl_end'	  => 'วันที่สิ้นสุด',
				'prmsvl_desc'     => 'คำอธิบาย',
				'prmsvl_price'     => 'ราคา(บาท)'
		) 
	),
	'companies' => array(
		'keyFieldName'  => 'comp_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'CP',
		'keyLength'		=> 4,
		'fieldNameList'	=> array(
				'comp_id'	      => 'รหัสบริษัทจำหน่ายผลิตภัณฑ์',
				'comp_name'	      => 'ชื่อบริษัท',
				'fax'             => 'แฟ็กซ์',
				'comp_tel'	      => 'เบอร์โทรศัพท์',
				'comp_addr'	      => 'ที่อยู่',
				'comp_contact'    => 'ชื่อผู้ติดต่อ'
				
		) 
	),
	'products' => array(
		'keyFieldName'  => 'prd_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'PD',
		'keyLength'		=> 6,
		'fieldNameList'	=> array(
				'prd_id'	      => 'รหัสผลิตภัณฑ์',
				'prdtyp_id'	      => 'รหัสประเภทผลิตภัณฑ์',
				'unit_id'         => 'รหัสหน่ายนับ',
				'brand_id'	      => 'รหัสยี่ห้อ',
				'prd_name'	      => 'ชื่อผลิตภัณฑ์',
				'prd_price'       => 'ราคา(บาท)',
				'prd_amount'      => 'จำนวน'
				
		) 
	),
	'time_attendances' => array(
		'keyFieldName'  => 'timeatt_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'W',
		'keyLength'		=> 8,
		'fieldNameList'	=> array(
				'timeatt_id'	  => 'รหัสการเข้าออกงาน',
				'emp_id'	      => 'รหัสพนักงาน',
				'timeatt_in'      => 'วัน-เวลาที่เข้า',
				'timeatt_out'	  => 'วัน-เวลาที่ออก'
				
		) 
	),

    'payrolls' => array(
		'keyFieldName'  => 'payroll_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'PR',
		'keyLength'		=> 7,
		'fieldNameList'	=> array(
				'payroll_id'	  => 'รหัสการจ่ายเงินเดือน',
				'emp_id'	      => 'รหัสพนักงาน',
				'payroll_salary'  => 'จำนวนเงินเดือน(บาท)',
				'payroll_commission' => 'ค่าคอมมิชชั่น(บาท)',
				'payroll_monthly' => 'ประจำเดือน-ปี'
				
		) 
	),
	'booking' => array(
		'keyFieldName'  => 'bkg_id',
		'keyFieldType'	=> 3, 
		'keyChar'		=> 'BK',
		'keyLength'		=> 15,
		'fieldNameList'	=> array(
				'bkg_id'	  		=> 'รหัสการจอง',
				'cus_id'	        => 'รหัสผู้ใช้บริการ',
				'emp_id' 		    => 'รหัสพนักงาน',
				'status_id'         => 'รหัสสถานะการจอง',
				'bnkacc_id'	        => 'รหัสบัญชีธนาคาร',
				'bkg_transfer_ time'=> 'วัน-เวลาที่โอน',
				'bkg_transfer_ evidence'  => 'หลักฐานการโอน',
				'bkg_total_price'         => 'ราคารวมการจองทั้งหมด(บาท)',
				'bkg_date'    			  => 'วัน-เวลาที่จอง',
				'bkg_transfer_money'      => 'จำนวนเงินที่โอน(บาท)'
				
		) 
	),
	'booking_service_lists' => array(
		'keyFieldName'  => 'bkgsvl_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'BL',
		'keyLength'		=> 8,
		'fieldNameList'	=> array(
				'bkgsvl_id'	  		 => 'รหัสรายละเอียดรายการบริการที่จอง',
				'svl_id'	         => 'รหัสรายการบริการ',
				'bkg_id' 		     => 'รหัสการจอง',
				'bkgsvl_date'        => 'วัน-เวลาที่ใช้บริการ',
				'bkgsvl_total_price' => 'ราคารวมการจองรายการบริการ(บาท)',
				'bkgsvl_persons'     => 'จำนวนผู้ใช้บริการ'
				
		) 
	),

	'booking_packages' => array(
		'keyFieldName'  => 'bkgpkg_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'BP',
		'keyLength'		=> 14,
		'fieldNameList'	=> array(
				'bkgpkg_id'	  		  => 'รหัสรายละเอียดแพ็คเกจที่จอง',
				'pkgsvl_id'	          => 'รหัสรายการบริการที่จัดแพ็คเกจ',
				'bkg_id' 		      => 'รหัสการจอง',
				'bkgpkg _date'        => 'วัน-เวลาที่ใช้บริการ',
				'bkgpkg_total_price' => 'ราคารวมการจองแพ็คเกจ(บาท)',
				'bkgpkg_persons'      => 'จำนวนผู้ใช้บริการ'
				
		) 
	),
	'booking_promotions' => array(
		'keyFieldName'  => 'bkgprm_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'BP',
		'keyLength'		=> 14,
		'fieldNameList'	=> array(
				'bkgprm_id'	  		  => 'รหัสรายละเอียดโปรโมชั่นที่จอง',
				'prmsvl_id'	          => 'รหัสรายการบริการที่จัดโปรโมชั่น',
				'bkg_id' 		      => 'รหัสการจอง',
				'bkgprm_date'        => 'วัน-เวลาที่ใช้บริการ',
				'bkgprm_total_price' => 'ราคารวมการจองโปรโมชั่น(บาท)',
				'bkgprm_persons'      => 'จำนวนผู้ใช้บริการ'
				
		) 
	),
	'services' => array(
		'keyFieldName'  => 'ser_id',
		'keyFieldType'	=> 3, 
		'keyChar'		=> 'SE',
		'keyLength'		=> 15,
		'fieldNameList'	=> array(
				'ser_id'	  		  => 'รหัสการใช้บริการ',
				'cus_id'	          => 'รหัสผู้ใช้บริการ',
				'emp_id' 		      => 'รหัสพนักงานที่รับเงิน',
				'svltyp_id'           => 'รหัสประเภทรายการใช้บริการ',
				'paytyp_id'			  => 'รหัสประเภทการชำระเงิน',
				'bed_id'      		  => 'รหัสเตียงนวด',
				'bkg_id'	  		  => 'รหัสการจอง',
				'ser_date'	          => 'วัน-เวลาที่ใช้บริการ',
				'ser_total_price' 	  => 'ราคารวมทั้งหมด(บาท)'
		) 
	),
	'service_service_lists' => array(
		'keyFieldName'  => 'sersvl_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'SS',
		'keyLength'		=> 14,
		'fieldNameList'	=> array(
				'sersvl_id'	  		  => 'รหัสรายละเอียดการใช้บริการรายการบริการ',
				'ser_id'	          => 'รหัสการใช้บริการ',
				'sersvl_total_ price'  => 'ราคารวม(บาท)'
		) 
	),
	'service_list_details' => array(
		'keyFieldName'  => 'svldtl_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'ST',
		'keyLength'		=> 15,
		'fieldNameList'	=> array(
				'svldtl_id'	  		  => 'รหัสรายละเอียดรายการบริการ',
				'svl_id'	          => 'รหัสรายการบริการ',
				'emp_id' 			  => 'รหัสพนักงาน',
				'sersvl_id'	  		  => 'รหัสรายละเอียดการใช้บริการรายการบริการ',
				'svldtl_com'	      => 'ค่าคอมมิชชั่น(บาท)'
				

		) 
	),
	'service_packages' => array(
		'keyFieldName'  => 'svlpkg_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'SK',
		'keyLength'		=> 14,
		'fieldNameList'	=> array(
				'serpkg_id'	  		  => 'รหัสรายละเอียดการใช้บริการแพ็คเกจ',
				'ser_id'	          => 'รหัสรายการใช้บริการ',
				'serpkg_total_ price' => 'ราคารวม(บาท)'
				

		) 
	),
	'package_details' => array(
		'keyFieldName'  => 'pkgdtl_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'PA',
		'keyLength'		=> 15,
		'fieldNameList'	=> array(
				'pkgdtl_id'	  		  => 'รหัสรายละเอียดแพ็คเกจ',
				'serpkg_id'	  		  => 'รหัสรายละเอียดการใช้บริการแพ็คเกจ',
				'pkgsvl_id'	          => 'รหัสรายการบริการที่จัดแพ็คเกจ',
				'emp_id' 			  => 'รหัสพนักงาน',
				'pkgdtl_comm'		  => 'ค่าคอมมิชชั่น(บาท)'
				

		) 
	),
	'service_promotions' => array(
		'keyFieldName'  => 'pkgdtl_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'SP',
		'keyLength'		=> 14,
		'fieldNameList'	=> array(
				'serprm_id'	  		  => 'รหัสรายละเอียดการใช้บริการโปรโมชั่น',
				'ser_id'	  		  => 'รหัสการใช้บริการ',
				'serprm_total_ price' => 'ราคารวม(บาท)'
				
		
		) 
	),
	'promotion_details' => array(
		'keyFieldName'  => 'prmdtl_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'PD',
		'keyLength'		=> 15,
		'fieldNameList'	=> array(
				'prmdtl_id'	  		  => 'รหัสรายละเอียดโปรโมชั่น',
				'emp_id' 			  => 'รหัสพนักงาน',
				'svl_id'	  		  => 'รหัสรายการบริการที่จัดโปรโมชั่น',
				'serprm_id'	  		  => 'รหัสรายละเอียดการใช้บริการโปรโมชั่น',
				'prmdtl_comm' 		  => 'ค่าคอมมิชชั่น(บาท)'
				
		
		) 
	),
	'element_checks' => array(
		'keyFieldName'  => 'elechk_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'EC',
		'keyLength'		=> 9,
		'fieldNameList'	=> array(
				'elechk_id'	  		  => 'รหัสการตรวจประเภทธาตุ',
				'eletyp_id' 		  => 'รหัสประเภทธาตุ',
				'emp_id' 			  => 'รหัสพนักงาน',
				'cus_id'	  		  => 'รหัสผู้ใช้บริการ',
				'elechk_date'	  	  => 'วัน-เวลาที่ตรวจ'
			
		) 
	),
	'orders' => array(
		'keyFieldName'  => 'ord_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'OR',
		'keyLength'		=> 7,
		'fieldNameList'	=> array(
				'ord_id'	  		  => 'รหัสการสั่งซื้อผลิตภัณฑ์',
				'ordtyp_id' 		  => 'รหัสประเภทการสั่งซื้อผลิตภัณฑ์',
				'emp_id' 			  => 'รหัสพนักงาน',
				'comp_id'	  		  => 'รหัสบริษัทจำหน่ายผลิตภัณฑ์',
				'ord_date'	  	      => 'วันที่สั่งซื้อ',
				'ord_snd_date'        => 'วันที่จัดส่ง'
			
		) 
	),
	'order_details' => array(
		'keyFieldName'  => 'orddtl_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'OD',
		'keyLength'		=> 9,
		'fieldNameList'	=> array(
				'orddtl_id'	  		  => 'รหัสรายละเอียดการสั่งซื้อผลิตภัณฑ์',
				'ord_id' 		      => 'รหัสการสั่งซื้อผลิตภัณฑ์',
				'prd_id' 			  => 'รหัสผลิตภัณฑ์',
				'orddtl_amount'	  	  => 'จำนวนที่สั่งซื้อ'
				
			
		) 
	),
	'receives' => array(
		'keyFieldName'  => 'rec_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'RE',
		'keyLength'		=> 7,
		'fieldNameList'	=> array(
				'rec_id'	  		  => 'รหัสการรับผลิตภัณฑ์',
				'ord_id' 		      => 'รหัสการสั่งซื้อผลิตภัณฑ์',
				'emp_id' 			  => 'รหัสพนักงาน',
				'rec_date'	  	      => 'วันที่รับผลิตภัณฑ์',
				'rec_total_price'	  => 'ราคา(บาท)'
			
		) 
	),
	'receive_details' => array(
		'keyFieldName'  => 'recdtl_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'RD',
		'keyLength'		=> 9,
		'fieldNameList'	=> array(
				'recdtl_id'	  		  => 'รหัสรายละเอียดการรับผลิตภัณฑ์',
				'rec_id'	  		  => 'รหัสการรับผลิตภัณฑ์',
				'prd_id' 		      => 'รหัสผลิตภัณฑ์',
				'recdtl_amount' 	  => 'จำนวนที่รับ',
				'recdtl_price'	  	  => 'ราคาต่อหน่วย(บาท)'
				
		) 
	),
	'withdraws' => array(
		'keyFieldName'  => 'wdw_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'W',
		'keyLength'		=> 8,
		'fieldNameList'	=> array(
				'wdw_id'	  		  => 'รหัสการเบิกผลิตภัณฑ์',
				'emp_id'	  		  => 'รหัสพนักงานที่ให้เบิก',
				'emp_give_id' 		  => 'รหัสผพนักงานที่เบิก',
				'ser_id' 	 		  => 'รหัสการใช้บริการ',
				'wdw_date'	  	      => 'วันที่เบิก'
				
		) 
	),
	'withdraw_details' => array(
		'keyFieldName'  => 'wdwdtl_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'WD',
		'keyLength'		=> 10,
		'fieldNameList'	=> array(
				'wdwdtl_id'	  		  => 'รหัสรายละเอียดการเบิกผลิตภัณฑ์',
				'wdw_id'	  		  => 'รหัสการเบิกผลิตภัณฑ์',
				'prd_id'	  		  => 'รหัสผลิตภัณฑ์',
				'wdwdtl_amount' 	  => 'จำนวนที่เบิก'
				
		) 
	),
	'sales' => array(
		'keyFieldName'  => 'sale_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'S',
		'keyLength'		=> 8,
		'fieldNameList'	=> array(
				'sale_id'	  		  => 'รหัสการขาย',
				'emp_id'	  		  => 'รหัสพนักงาน',
				'sale_date'	  		  => 'วันที่ขาย',
				'sale_total_price' 	  => 'ราคารวม(บาท)'
				
		) 
	),
	'sale_details' => array(
		'keyFieldName'  => 'saledtl_id',
		'keyFieldType'	=> 2, 
		'keyChar'		=> 'SD',
		'keyLength'		=> 12,
		'fieldNameList'	=> array(
				'saledtl_id'	  	  => 'รหัสรายละเอียดการขาย',
				'sale_id'	  		  => 'รหัสการขาย',
				'prd_id'	  		  => 'รหัสผลิตภัณฑ์',
				'saledtl_amount'	  => 'จำนวน',
				'saledtl_price' 	  => 'ราคาต่อหน่วย(บาท)'
				
		) 
	)
 );
 /*วิธีการเรียกใช้ array $table['employees']['fieldNameList']['pos_name'];*/
?>
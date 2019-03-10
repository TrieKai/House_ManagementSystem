//讀取資料庫資料
LoadData("php/Object/ObjectLicense.php", "TableInfo", GetData, "class=1");
//讀取資料庫資料
LoadData("php/Tenant/Action/Getdata/SearchAttributeGetdata.php", "SelectSearchAttribute", SelectonGetData, "TableName="+"license");
//Textarea編輯
TextareaEditSendData("TableInfo", "php/Object/Action/Update/ObjectLicenseUpdata.php", GetData, "class=1");
//select編輯
SelectEditSendData("TableInfo", "php/Object/Action/Update/ObjectLicenseUpdata.php", GetData, "class=1");
//Input編輯
InputEditSendData("TableInfo", "php/Object/Action/Update/ObjectLicenseUpdata.php", GetData, "class=1");
//開啟Iput tag 輸入功能
InputEdit("ModalInsert");
//取消按鍵清除Input tag的value
BtnCancel("BtnCancel","ModalInsert");
//Insert 按鍵功能
BtnInsert("BtnConfirmInsert", "ModalInsert","php/Tenant/Action/Insert/FunctionInsert.php");

BtnInsertModal("BtnInsertModal", "ModalInsert", "php/Object/ModalShow/ObjectLicenseInsert.php");

BtnDeleteModal("BtnDeleteModal", "TableInfo", "ModalDelete", "php/Tenant/ModalShow/ModalShowDelte.php","license_number");

BtnConfirmDelete("BtnConfirmDelete", "TableInfo", "DivModalDelete", "php/Tenant/Action/Delete/TenantInfoDelete.php","license_number");

BtnSearch("BtnSearch", "InputSearch", "SelectSearchAttribute", "license", "TableInfo", "php/Object/Action/Search/ObjectLicenseSearch.php")
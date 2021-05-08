<?php
/*$sql_member = " select * from tbl_member_info where mem_id='".$_SESSION[ 'a_mid' ]."' ";
$qry_member = mysqli_query( $DB_LINK1, $sql_member );
$data_member = mysqli_fetch_array( $qry_member );
$sql_foruser = " select id,pic,status,pan_image,is_kyc,bank_data_flag,account_holder,bank_name,account_number,branch,ifsc_code,member_refresh_time    from registration where user='".$_SESSION[ 'a_mid' ]."' ";
$qry_foruser = mysqli_query( $DB_LINK1, $sql_foruser );
$data_foruser = mysqli_fetch_array( $qry_foruser );*/
master_user();
?>
<!-- Custom fonts for this template-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.3.0/font-awesome-animation.min.css"   />
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<!-- Custom styles for this template-->
<link href="../core/css/sb-admin-2.min.css" rel="stylesheet">
<link href="../core/sweetalert/sweetalert.css" rel="stylesheet">
<style>
  .horizontal-menu .top-navbar {
    font-weight: 400;
    background: #ffffff;
    border-bottom: 1px solid #e4e9f0; }
  .horizontal-menu .top-navbar .navbar-brand-wrapper {
    width: auto;
    height: 70px; }
  .horizontal-menu .top-navbar .navbar-brand-wrapper .navbar-brand {
    color: #27367f;
    font-size: 1.5rem;
    margin-right: 0;
    padding: 0.25rem 0;
    text-align: left; }
  .horizontal-menu .top-navbar .navbar-brand-wrapper .navbar-brand.brand-logo-mini {
    display: none;
    padding-left: 0;
    text-align: center; }
  .horizontal-menu .top-navbar .navbar-brand-wrapper .navbar-brand.brand-logo-mini img {
    width: 30px;
    max-width: 100%;
    margin: auto; }
  .horizontal-menu .top-navbar .navbar-brand-wrapper .navbar-brand:active, .horizontal-menu .top-navbar .navbar-brand-wrapper .navbar-brand:focus, .horizontal-menu .top-navbar .navbar-brand-wrapper .navbar-brand:hover {
    color: #1b2658; }
  .horizontal-menu .top-navbar .navbar-brand-wrapper .navbar-brand img {
    max-width: 100%;
    width: 149px;
    height: 34px;
    margin: auto;
    vertical-align: middle; }
  @media (max-width: 991px) {
    .horizontal-menu .top-navbar .navbar-brand-wrapper .navbar-brand {
      width: 55px; }
    .horizontal-menu .top-navbar .navbar-brand-wrapper .navbar-brand.brand-logo {
      display: none; }
    .horizontal-menu .top-navbar .navbar-brand-wrapper .navbar-brand.brand-logo-mini {
      display: block; } }
  .horizontal-menu .top-navbar .navbar-menu-wrapper {
    color: #000000;
    width: auto;
    height: 70px;
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1; }
  @media (max-width: 991px) {
    .horizontal-menu .top-navbar .navbar-menu-wrapper {
      width: calc(100% - 55px);
      padding-left: 15px;
      padding-right: 0; } }
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-toggler {
    border: 0;
    color: inherit;
    font-size: 1.5rem; }
  @media (max-width: 991px) {
    .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-toggler:not(.navbar-toggler-right) {
      display: none; } }
  @media (max-width: 991px) {
    .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-toggler.navbar-toggler-right {
      padding-left: 15px;
      padding-right: 11px; } }
  .rtl .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav {
    padding-right: 0; }
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item {
    margin-left: 1rem;
    margin-right: 1rem; }
  @media (max-width: 767px) {
    .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item {
      margin-left: 0.5rem;
      margin-right: 0.5rem; } }
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item .nav-link {
    color: inherit;
    font-size: 1rem;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center; }
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item .nav-link i {
    font-size: 14px; }
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-profile .nav-profile-img {
    position: relative; }
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-profile .nav-profile-img img {
    width: 39px;
    height: 39px;
    border-radius: 100%; }
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-profile .nav-profile-text {
    margin-left: 1.25rem;
    line-height: 1; }
  .rtl .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-profile .nav-profile-text {
    margin-left: 0;
    margin-right: 1.25rem; }
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-profile .nav-profile-text p {
    margin-bottom: 0; }
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-profile .nav-profile-text .online-color,
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-profile .nav-profile-text i {
    color: #a0a0a0; }
  @media (max-width: 767px) {
    .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-profile .nav-profile-text {
      display: none; } }
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-profile .nav-link::after {
    font-size: 1rem; }
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search {
    margin-left: 49px; }
  .rtl .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search {
    margin-left: 0;
    margin-right: 49px; }
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group {
    border-radius: 4px;
    max-width: 725px;
    max-height: 39px; }
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .form-control, .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-container--default .select2-selection--single, .select2-container--default .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-selection--single, .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-container--default .select2-selection--single .select2-search__field, .select2-container--default .select2-selection--single .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-search__field, .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .typeahead,
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .tt-query,
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .tt-hint,
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .input-group-text {
    background: #e4e9f0;
    border: 0;
    color: #000000;
    padding: 0; }
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .input-group-text {
    max-height: 39px; }
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .input-group-text i {
    font-size: 15px;
    padding: 12px 15px;
    color: #a0a0a0; }
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .form-control, .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-container--default .select2-selection--single, .select2-container--default .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-selection--single, .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-container--default .select2-selection--single .select2-search__field, .select2-container--default .select2-selection--single .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-search__field, .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .typeahead,
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .tt-query,
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .tt-hint {
    max-height: 39px;
    padding: 12px 534px 12px 0; }
  @media (max-width: 1198px) {
    .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .form-control, .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-container--default .select2-selection--single, .select2-container--default .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-selection--single, .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-container--default .select2-selection--single .select2-search__field, .select2-container--default .select2-selection--single .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-search__field, .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .typeahead,
    .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .tt-query,
    .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .tt-hint {
      padding: 12px 0 12px 359px; } }
  .rtl .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .form-control, .rtl .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-container--default .select2-selection--single, .select2-container--default .rtl .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-selection--single, .rtl .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-container--default .select2-selection--single .select2-search__field, .select2-container--default .select2-selection--single .rtl .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-search__field, .rtl .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .typeahead,
  .rtl .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .tt-query,
  .rtl .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .tt-hint {
    padding: 12px 0 12px 534px; }
  @media (max-width: 1198px) {
    .rtl .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .form-control, .rtl .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-container--default .select2-selection--single, .select2-container--default .rtl .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-selection--single, .rtl .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-container--default .select2-selection--single .select2-search__field, .select2-container--default .select2-selection--single .rtl .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-search__field, .rtl .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .typeahead,
    .rtl .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .tt-query,
    .rtl .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .tt-hint {
      padding: 12px 0 12px 359px; } }
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .form-control::-webkit-input-placeholder, .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-container--default .select2-selection--single::-webkit-input-placeholder, .select2-container--default .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-selection--single::-webkit-input-placeholder, .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-container--default .select2-selection--single .select2-search__field::-webkit-input-placeholder, .select2-container--default .select2-selection--single .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-search__field::-webkit-input-placeholder, .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .typeahead::-webkit-input-placeholder,
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .tt-query::-webkit-input-placeholder,
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .tt-hint::-webkit-input-placeholder {
    color: #000000;
    font-size: 14px;
    font-weight: 600; }
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .form-control:-moz-placeholder, .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-container--default .select2-selection--single:-moz-placeholder, .select2-container--default .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-selection--single:-moz-placeholder, .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-container--default .select2-selection--single .select2-search__field:-moz-placeholder, .select2-container--default .select2-selection--single .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-search__field:-moz-placeholder, .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .typeahead:-moz-placeholder,
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .tt-query:-moz-placeholder,
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .tt-hint:-moz-placeholder {
    color: #000000;
    font-size: 14px;
    font-weight: 600; }
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .form-control::-moz-placeholder, .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-container--default .select2-selection--single::-moz-placeholder, .select2-container--default .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-selection--single::-moz-placeholder, .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-container--default .select2-selection--single .select2-search__field::-moz-placeholder, .select2-container--default .select2-selection--single .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-search__field::-moz-placeholder, .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .typeahead::-moz-placeholder,
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .tt-query::-moz-placeholder,
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .tt-hint::-moz-placeholder {
    color: #000000;
    font-size: 14px;
    font-weight: 600; }
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .form-control:-ms-input-placeholder, .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-container--default .select2-selection--single:-ms-input-placeholder, .select2-container--default .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-selection--single:-ms-input-placeholder, .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-container--default .select2-selection--single .select2-search__field:-ms-input-placeholder, .select2-container--default .select2-selection--single .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .select2-search__field:-ms-input-placeholder, .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .typeahead:-ms-input-placeholder,
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .tt-query:-ms-input-placeholder,
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.nav-search .input-group .tt-hint:-ms-input-placeholder {
    color: #000000;
    font-size: 14px;
    font-weight: 600; }
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown .navbar-dropdown {
    position: absolute;
    font-size: 0.9rem;
    margin-top: 0;
    right: 0;
    left: auto;
    top: 70px; }
  .rtl .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown .navbar-dropdown {
    right: auto;
    left: 0; }
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown .navbar-dropdown .dropdown-item {
    margin-bottom: 0;
    padding: 0.687rem 1.562rem;
    cursor: pointer; }
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown .navbar-dropdown .dropdown-item:hover {
    color: inherit; }
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown .navbar-dropdown .dropdown-item i {
    font-size: 17px; }
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown .navbar-dropdown .dropdown-item .badge {
    margin-left: 2.5rem; }
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown .navbar-dropdown .dropdown-item .ellipsis {
    max-width: 200px;
    overflow: hidden;
    text-overflow: ellipsis; }
  .rtl .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown .navbar-dropdown .dropdown-item i {
    margin-left: 10px; }
  .rtl .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown .navbar-dropdown .dropdown-item .badge {
    margin-left: 0;
    margin-right: 2.5rem; }
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown .navbar-dropdown .dropdown-divider {
    margin: 0; }
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown i {
    margin-right: 0.5rem;
    vertical-align: middle; }
  @media (max-width: 991px) {
    .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown {
      position: static; }
    .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown .navbar-dropdown {
      left: 20px;
      right: 20px;
      top: 70px;
      width: calc(100% - 40px); } }
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown .dropdown-menu {
    border: none;
    -webkit-box-shadow: 0px 3px 21px 0px rgba(0, 0, 0, 0.2);
    box-shadow: 0px 3px 21px 0px rgba(0, 0, 0, 0.2); }
  @media (min-width: 992px) {
    .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item.dropdown .dropdown-menu:before {
      content: "";
      border: 10px solid transparent;
      height: 0;
      width: 0;
      border-bottom: 8px solid white;
      position: absolute;
      right: 10px;
      bottom: 100%;
      border-radius: 2px; } }
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav .nav-item:last-child {
    margin-right: 0; }
  .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav.navbar-nav-right .nav-item {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center; }
  @media (min-width: 992px) {
    .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav.navbar-nav-right {
      margin-left: auto; }
    .rtl .horizontal-menu .top-navbar .navbar-menu-wrapper .navbar-nav.navbar-nav-right {
      margin-left: 0;
      margin-right: auto; } }

  .horizontal-menu .bottom-navbar {

    position: relative;
    top: 0;
    right: 0;
    left: 0;
    width: 100%;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-transition-duration: 3s;
    transition-duration: 3s;
    -webkit-transition-property: position, left, right, top, z-index;
    transition-property: position, left, right, top, z-index;
    box-shadow: 0 19px 34px -15px #d2d2f2;
    -webkit-box-shadow: 0 19px 34px -15px #d2d2f2;
    -moz-box-shadow: 0 19px 34px -15px #d2d2f2; }
  @media (max-width: 991.98px) {
    .horizontal-menu .bottom-navbar {
      display: none; }
    .horizontal-menu .bottom-navbar.header-toggled {
      display: block;
      max-height: calc(100vh - 70px);
      overflow: auto; } }
  .horizontal-menu .bottom-navbar .page-navigation {
    position: relative;
    width: 100%;
    z-index: 99;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -webkit-transition-duration: 0.2s;
    transition-duration: 0.2s;
    -webkit-transition-property: background, box-shadow;
    -webkit-transition-property: background, -webkit-box-shadow;
    transition-property: background, -webkit-box-shadow;
    transition-property: background, box-shadow;
    transition-property: background, box-shadow, -webkit-box-shadow; }
  @media (max-width: 991.98px) {
    .horizontal-menu .bottom-navbar .page-navigation {
      border: none; } }
  .horizontal-menu .bottom-navbar .page-navigation > .nav-item {
    line-height: 1;
    text-align: left;
    border-right: 1px solid rgba(151, 151, 151, 0.34); }
  @media (max-width: 991.98px) {
    .horizontal-menu .bottom-navbar .page-navigation > .nav-item {
      display: block;
      width: 100%;
      border-right: none; } }
  @media (min-width: 992px) {
    .horizontal-menu .bottom-navbar .page-navigation > .nav-item:first-child > .nav-link {
      padding-left: 0; } }
  .horizontal-menu .bottom-navbar .page-navigation > .nav-item:last-child {
    border-right: none; }
  @media (min-width: 992px) {
    .horizontal-menu .bottom-navbar .page-navigation > .nav-item:last-child > .nav-link {
      padding: 15px 0 15px 13px;
      border: 0; }
    .horizontal-menu .bottom-navbar .page-navigation > .nav-item:last-child > .nav-link i {
      font-size: 20px; } }
  .horizontal-menu .bottom-navbar .page-navigation > .nav-item > .nav-link {
    color: #ffffff;
    padding: 22px 12px 22px 7px;
    line-height: 1;
    font-weight: 400; }
  .horizontal-menu .bottom-navbar .page-navigation > .nav-item > .nav-link .menu-title {
    font-size: 0.875rem;
    font-weight: 400; }
  .horizontal-menu .bottom-navbar .page-navigation > .nav-item > .nav-link .menu-icon {
    margin-right: 10px;
    font-size: 14px;
    color: #ffffff;
    font-weight: 400; }
  .rtl .horizontal-menu .bottom-navbar .page-navigation > .nav-item > .nav-link .menu-icon {
    margin-right: 0;
    margin-left: 10px; }
  @media (min-width: 992px) {
    .horizontal-menu .bottom-navbar .page-navigation > .nav-item > .nav-link .dropdown-menu-right:before {
      content: "";
      border: 10px solid transparent;
      height: 0;
      width: 0;
      border-bottom: 8px solid white;
      position: absolute;
      right: 10px;
      bottom: 100%;
      border-radius: 2px; } }
  .horizontal-menu .bottom-navbar .page-navigation > .nav-item > .nav-link .menu-arrow {
    margin-left: 5px;
    display: inline-block;
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
    moz-transform-origin: center;
    -webkit-transform-origin: center;
    transform-origin: center;
    -webkit-transition-duration: 0.25s;
    transition-duration: 0.25s;
    opacity: 0.53; }
  .rtl .horizontal-menu .bottom-navbar .page-navigation > .nav-item > .nav-link .menu-arrow {
    margin-left: 0;
    margin-right: 5px; }
  .horizontal-menu .bottom-navbar .page-navigation > .nav-item > .nav-link .menu-arrow:before {
    content: "\f140";
    font-family: "Material Design Icons";
    font-style: normal;
    display: block;
    font-size: 18px;
    line-height: 10px; }
  @media (min-width: 768px) {
    .horizontal-menu .bottom-navbar .page-navigation > .nav-item:hover .submenu {
      display: block; }
    .horizontal-menu .bottom-navbar .page-navigation > .nav-item:hover > .nav-link {
      background: transparent; }
    .horizontal-menu .bottom-navbar .page-navigation > .nav-item:hover > .nav-link i,
    .horizontal-menu .bottom-navbar .page-navigation > .nav-item:hover > .nav-link .menu-title {
      color: #215bff;
      -webkit-transition: color 1s ease;
      transition: color 1s ease; }
    .horizontal-menu .bottom-navbar .page-navigation > .nav-item:hover > .nav-link .menu-arrow {
      -webkit-transform: rotate(-180deg);
      transform: rotate(-180deg);
      moz-transform-origin: center;
      -webkit-transform-origin: center;
      transform-origin: center;
      -webkit-transition-duration: 0.25s;
      transition-duration: 0.25s; } }
  @media (max-width: 991.98px) {
    .horizontal-menu .bottom-navbar .page-navigation > .nav-item.show-submenu .submenu {
      display: block; }
    .horizontal-menu .bottom-navbar .page-navigation > .nav-item.show-submenu > .nav-link {
      background: transparent; }
    .horizontal-menu .bottom-navbar .page-navigation > .nav-item.show-submenu > .nav-link i,
    .horizontal-menu .bottom-navbar .page-navigation > .nav-item.show-submenu > .nav-link .menu-title {
      color: #215bff;
      -webkit-transition: color 1s ease;
      transition: color 1s ease; }
    .horizontal-menu .bottom-navbar .page-navigation > .nav-item.show-submenu > .nav-link .menu-arrow {
      -webkit-transform: rotate(-180deg);
      transform: rotate(-180deg);
      moz-transform-origin: center;
      -webkit-transform-origin: center;
      transform-origin: center;
      -webkit-transition-duration: 0.25s;
      transition-duration: 0.25s; } }
  .horizontal-menu .bottom-navbar .page-navigation > .nav-item.active > .nav-link {
    position: relative; }
  .horizontal-menu .bottom-navbar .page-navigation > .nav-item.active > .nav-link:before {
    position: absolute;
    content: "";
    left: 0;
    bottom: -2px;
    width: 100%;
    height: 5px; }
  @media (max-width: 991px) {
    .horizontal-menu .bottom-navbar .page-navigation > .nav-item.active > .nav-link:before {
      left: -15px;
      top: 0;
      bottom: 0;
      height: 100%;
      width: 5px; } }
  .horizontal-menu .bottom-navbar .page-navigation > .nav-item.active > .nav-link .menu-title,
  .horizontal-menu .bottom-navbar .page-navigation > .nav-item.active > .nav-link i,
  .horizontal-menu .bottom-navbar .page-navigation > .nav-item.active > .nav-link .menu-arrow {
    color: #ffffff;
    font-weight: 600; }
  .horizontal-menu .bottom-navbar .page-navigation > .nav-item .submenu {
    display: none; }
  @media (max-width: 991px) {
    .horizontal-menu .bottom-navbar .page-navigation > .nav-item .submenu {
      background: #ffffff; } }
  .horizontal-menu .bottom-navbar .page-navigation > .nav-item .submenu ul {
    list-style-type: none;
    padding-left: 0; }
  .horizontal-menu .bottom-navbar .page-navigation > .nav-item .submenu ul li {
    display: block;
    line-height: 20px; }
  .horizontal-menu .bottom-navbar .page-navigation > .nav-item .submenu ul li a {
    display: block;
    padding: 5px 10px;
    font-weight: 300;
    color: #000;
    text-decoration: none;
    text-align: left;
    margin: 4px 0;
    text-overflow: ellipsis;
    overflow: hidden;
    max-width: 100%;
    white-space: nowrap;
    -webkit-transition-duration: 0.2s;
    transition-duration: 0.2s;
    -webkit-transition-property: background;
    transition-property: background;
    border-radius: 6px; }
  .horizontal-menu .bottom-navbar .page-navigation > .nav-item .submenu ul li a:hover {

    -webkit-transition: color 0.1s linear;
    transition: color 0.1s linear; }
  .horizontal-menu .bottom-navbar .page-navigation > .nav-item .submenu ul li a:hover:before {
     }
  .horizontal-menu .bottom-navbar .page-navigation > .nav-item .submenu ul li a.active {
     }
  .horizontal-menu .bottom-navbar .page-navigation > .nav-item .submenu ul li.active a {
     }
  .horizontal-menu .bottom-navbar .page-navigation > .nav-item .submenu ul li.active a:before {
     }
  .horizontal-menu .bottom-navbar .page-navigation > .nav-item:not(.mega-menu) {
    position: relative; }
  .horizontal-menu .bottom-navbar .page-navigation > .nav-item:not(.mega-menu) .submenu {
    left: 0; }
  @media (min-width: 768px) {
    .horizontal-menu .bottom-navbar .page-navigation > .nav-item:not(.mega-menu) .submenu {
      position: absolute;
      top: 58px;
      z-index: 999;
      background: #ffffff;
      border-top: none;
      border-radius: 4px;
      box-shadow: 1px 0px 20px rgba(0, 0, 0, 0.08);
      -webkit-box-shadow: 1px 0px 20px rgba(0, 0, 0, 0.08); }
    .horizontal-menu .bottom-navbar .page-navigation > .nav-item:not(.mega-menu) .submenu li a {
      position: relative;
      padding-left: 20px; }
    .horizontal-menu .bottom-navbar .page-navigation > .nav-item:not(.mega-menu) .submenu li a::before {
      position: absolute;
      content: "";
      width: 6px;
      height: 2px;
      border-radius: 100%;
      background: #a0a0a0;
      top: 12px;
      left: 0; } }
  @media (max-width: 991.98px) {
    .horizontal-menu .bottom-navbar .page-navigation > .nav-item:not(.mega-menu) .submenu {
      position: relative;
      top: 0;
      -webkit-box-shadow: none;
      box-shadow: none; } }
  @media (max-width: 991.98px) {
    .horizontal-menu .bottom-navbar .page-navigation > .nav-item:not(.mega-menu) .submenu {
      top: 0; } }
  .horizontal-menu .bottom-navbar .page-navigation > .nav-item:not(.mega-menu) .submenu ul {
    width: auto;
    padding: 25px; }
  @media (max-width: 991.98px) {
    .horizontal-menu .bottom-navbar .page-navigation > .nav-item:not(.mega-menu) .submenu ul {
      padding: 0 23px; } }
  .horizontal-menu .bottom-navbar .page-navigation > .nav-item.mega-menu .submenu {
    width: 100%;
    left: 0;
    right: 0;
    padding: 25px; }
  @media (min-width: 768px) {
    .horizontal-menu .bottom-navbar .page-navigation > .nav-item.mega-menu .submenu {
      position: absolute;
      top: 58px;
      z-index: 999;
      background: #ffffff;
      border-top: none;
      border-radius: 4px;
      box-shadow: 1px 0px 20px rgba(0, 0, 0, 0.08);
      -webkit-box-shadow: 1px 0px 20px rgba(0, 0, 0, 0.08); }
    .horizontal-menu .bottom-navbar .page-navigation > .nav-item.mega-menu .submenu li a {
      position: relative;
      padding-left: 20px; }
    .horizontal-menu .bottom-navbar .page-navigation > .nav-item.mega-menu .submenu li a::before {
      position: absolute;
      content: "";
      width: 6px;
      height: 2px;
      border-radius: 100%;
      background: #a0a0a0;
      top: 12px;
      left: 0; } }
  @media (max-width: 991.98px) {
    .horizontal-menu .bottom-navbar .page-navigation > .nav-item.mega-menu .submenu {
      position: relative;
      top: 0;
      -webkit-box-shadow: none;
      box-shadow: none; } }
  .horizontal-menu .bottom-navbar .page-navigation > .nav-item.mega-menu .submenu .category-heading {
    font-size: 0.875rem;
    font-weight: 500;
    text-align: left;
    color: #000;
    padding: 1rem 0;
    margin-bottom: 0; }
  .horizontal-menu .bottom-navbar .page-navigation > .nav-item.mega-menu .submenu .col-group-wrapper {
    padding: 0 1rem; }
  @media (max-width: 991.98px) {
    .horizontal-menu .bottom-navbar .page-navigation > .nav-item.mega-menu .submenu {
      padding: 0 32px; }
    .horizontal-menu .bottom-navbar .page-navigation > .nav-item.mega-menu .submenu .col-group-wrapper {
      margin-left: 0;
      margin-right: 0;
      padding: 0; }
    .horizontal-menu .bottom-navbar .page-navigation > .nav-item.mega-menu .submenu .col-group-wrapper .col-group {
      padding-left: 0;
      padding-right: 0;
      margin-bottom: 20px; }
    .horizontal-menu .bottom-navbar .page-navigation > .nav-item.mega-menu .submenu .col-group-wrapper .col-group .category-heading:after {
      display: none; } }

  .horizontal-menu.fixed-on-scroll .bottom-navbar {
    border-bottom: 1px solid #e4e9f0; }

  @media (max-width: 991px) {
    .horizontal-menu {
      position: fixed;
      z-index: 1030;
      top: 0;
      left: 0;
      right: 0; } }
</style>



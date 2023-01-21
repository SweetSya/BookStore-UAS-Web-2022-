<?php 
	header('content-type:text/css; charset:UTF-8;');
?>

html {
	padding: 0px;
	margin: 0px;
	color: white;

	font-family: 'Work Sans';
}
body {
	padding: 0px;
	margin: 0px;
}
.px25-img {
	width: 25px;
	height: 25px;
}
.clean-btn {
	background-color: transparent;
	color: white;

	border: none;
	font-size: 23px;

	cursor: pointer;
}
.wrap-column-center {
	display: flex;
	flex-flow: column;
	justify-content: center;
	align-items: center;
}
.wrap-row-center {
	display: flex;
	flex-flow: row;
	justify-content: right;
	align-items: center;
}
.wrap-circle {
	background-color: white;
	border-radius: 100%;
}

#main-container {
	width: 100%;
	height: 100vh;

	display: grid;
	grid-template-columns: 100%;
	grid-template-rows:  120px 5px auto;
	grid-template-areas: 
	"top-con"
	"."
	"content-con"
	;
}

#top-container {
	grid-area: top-con;
	background-color: rgba(48, 71, 94, 1);
	padding: 10px;

	display: flex;
	align-items: center;
	justify-content: space-between;
}
#top-back {
	width: auto;
}
#back-arrow {
	cursor: pointer;
	margin-left: 15px; 
	transition: .2s ease;
}
#back-arrow:hover {
	margin-left: 5px;
}
#top-search {
	width: 60%;
}

#content-container {
	grid-area: content-con;
	background-color: rgb(241, 246, 249);

	display: grid;
	grid-template-rows: 120px 10px minmax(350px, auto) 10px 70px;
	grid-template-columns: 100%;
	grid-template-areas: 
	"top-content"
	"."
	"mid-content"
	"."
	"bot-content"
	;
}
#top-content {
	grid-area: top-content;
	background-color: rgba(48, 71, 94, 1);
}

#mid-content {
	grid-area: mid-content;
	background-color: rgb(241, 246, 249);
	width: 100%;
	height: 100%;

	display: flex;
	flex-flow: column;
	justify-content: space-evenly;
	align-items: center;
}
.table-outer {
	width: 93%;
}
.table-content {
	cursor: pointer;

	display: flex;
	flex-flow: row;
	align-items: center;

	width: 97%;
	height: 50px;

	margin: 10px 0px 10px .9%;
	padding: 0px .6% 0px .6%;
	background-color: rgb(187, 191, 202);
	border-radius: 7px;

	color: black;
	font-size: 16px;
}
.table-header-content {
	display: flex;
	flex-flow: row;

	width: 97%;
	height: 100%;

	margin: 0px 1.5% 0px 1.5%;
}

.table-wrapper-1 {
	width: 33.3%;
	display: flex;
	align-items: center;
}
.table-wrapper-2 {
	width: 33.4%;
	display: flex;
	align-items: center;
}
.table-wrapper-3 {
	width: 33.3%;
	display: flex;
	align-items: center;
}
#table-header {
	height: 60px;
}
.table-header-text {
	height: 80%;
	display: flex;
	flex-flow: row;
	align-items: center;
	justify-content: left;

	background-color: rgb(48, 71, 94);
	border-radius: 16px;
}
#filter-id {
	width: 90px;
}
#filter-total {
	width: 120px;
}
#filter-date {
	width: 110px;
}

#content-table-wrapper {
	height: 80%;
	max-height: 500px;
	background-color: rgb(244, 244, 242);
	box-shadow: 1px 4px 30px -4px rgba(0,0,0,0.75);
	-webkit-box-shadow: 1px 4px 30px -4px rgba(0,0,0,0.75);
	-moz-box-shadow: 1px 4px 30px -4px rgba(0,0,0,0.75);

	overflow-y: scroll;
	border-radius: 10px;
}


#bot-content {
	grid-area: bot-content;
	background-color: rgb(48, 71, 94);
}

#content-table-wrapper::-webkit-scrollbar {
  width: 0px;
}

.table-info-more {
	display: flex;
	flex-flow: row;
	justify-content: left;

	width: 97%;
	max-height: 0px;
	overflow-y: hidden;

	margin: 10px 0px 10px .9%;
	padding: 0px .6% 0px .6%;
	background-color: rgb(57, 72, 103);
	border-radius: 7px;

	color: white;
	font-size: 16px;
	transition: .2s ease;
}

.table-more-left {
	width: 15%;
	min-width: 140px;
}
.table-more-mid {
	width: 3%;
	min-width: 40px;
}
.table-more-right {
	width: 15%;
	min-width: 90px;
}

.table-more-inner-layout {
	margin-bottom: 10px;
}
.open-table-more {
	max-height: 100%;
	padding: 10px .6% 10px .6%;
}
.btn-delete-id {
	width: 80px;
	height: 30px;
	background-color: rgba(255, 255, 255, 1);
	border: none;
	border-radius: 10px;
	transition: .3s ease;
}
.btn-delete-id:hover {
	transform: scale(.96);
	filter: opacity(80%);
	background-color: grey;
	color: white;
}
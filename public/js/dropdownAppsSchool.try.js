//DropdownOne AppsSchool 1.02.021
//Author : DavidAprilio_12tkj2-A8
const thisDdown=document.getElementById('this-ddown'),css = `.ddown{position:relative}.ddown button#btn-ddown{width:39px;height:39px;background:0 0;border:none;border-radius:50%;padding:10px;text-align:center}.ddown button#btn-ddown svg{display:block;width:20px;height:20px;border:none;margin:auto}.ddown button#btn-ddown:focus{outline:0}.ddown button#btn-ddown:hover{background:rgba(0,0,0,.1)}.ddown .menu-ddown{position:absolute;top:100%;left:0;display:none;z-index:1000!important;transform:translateX(-230px);box-shadow:0 3px 10px #bbb;float:left;min-width:250px;min-height:300px;max-height:450px;overflow-y:auto;padding:10px 6px;margin:.125rem 0 0;font-size:1rem;color:#212529;text-align:left;list-style:none;background-color:#fff;background-clip:padding-box;border:1px solid rgba(0,0,0,.15);border-radius:.25rem}.ddown .menu-ddown::-webkit-scrollbar{width:6px}.ddown .menu-ddown::-webkit-scrollbar-track{background:#fff;border-radius:5px}.ddown .menu-ddown::-webkit-scrollbar-thumb{border-radius:5px;background:#999}.ddown .menu-ddown::-webkit-scrollbar-thumb:hover{background:#aaa}.ddown.show-ddown .menu-ddown{display:flex;flex-wrap:wrap}.ddown .menu-ddown a{position:relative;display:block;flex:0 0 50%;text-align:center;padding:5px;text-decoration:none;cursor:default}.ddown .menu-ddown a div{padding:8px}.ddown .menu-ddown a div img{width:50px;height:50px}.ddown .menu-ddown a div span{display:block;color:#444;font-size:19px;cursor:pointer}.ddown 
.menu-ddown a div span:hover{color:#1090c4}
.rowddownApp {
	width: 100%;
	display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
}
.coldddownApp {
	text-align: center;
    -ms-flex: 0 0 50%;
    flex: 0 0 50%;
    max-width: 50%;
    position: relative;
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
}
.cardddownApp {
	padding: 5px;
	color: #222 !important;
	border-radius: 6px;
}
.cardddownApp:hover {
	background: #eee;
}
.cardddownApp img {
	width: 50px;
}
.cardddownApp h5 {
	font-weight: light;
	font-size: 16px;
}`
,head=document.head || document.getElementsByTagName('head')[0],cStyle=document.createElement('style');thisDdown.classList.add('ddown');thisDdown.innerHTML = `<button id="btn-ddown" title="Aplikasi"><svg enable-background="new 0 0 276.167 276.167" version="1.1" viewBox="0 0 276.17 276.17" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"><path d="m33.144 2.471c-17.808 0-32.294 14.487-32.294 32.294s14.48 32.293 32.294 32.293 32.294-14.486 32.294-32.293-14.487-32.294-32.294-32.294z"/><path d="m137.66 2.471c-17.807 0-32.294 14.487-32.294 32.294s14.487 32.293 32.294 32.293c17.808 0 32.297-14.486 32.297-32.293s-14.483-32.294-32.297-32.294z"/><path d="m243.87 67.059c17.804 0 32.294-14.486 32.294-32.293s-14.478-32.295-32.294-32.295-32.294 14.487-32.294 32.294 14.489 32.294 32.294 32.294z"/><path d="m32.3 170.54c17.807 0 32.297-14.483 32.297-32.293 0-17.811-14.49-32.297-32.297-32.297s-32.3 14.487-32.3 32.297 14.493 32.293 32.3 32.293z"/><path d="m136.82 170.54c17.804 0 32.294-14.483 32.294-32.293 0-17.811-14.478-32.297-32.294-32.297-17.813 0-32.294 14.486-32.294 32.297 0 17.81 14.487 32.293 32.294 32.293z"/><path d="m243.04 170.54c17.811 0 32.294-14.483 32.294-32.293 0-17.811-14.483-32.297-32.294-32.297s-32.306 14.486-32.306 32.297c0 17.81 14.49 32.293 32.306 32.293z"/><path d="m33.039 209.11c-17.807 0-32.3 14.483-32.3 32.294 0 17.804 14.493 32.293 32.3 32.293s32.293-14.482 32.293-32.293-14.486-32.294-32.293-32.294z"/><path d="m137.56 209.11c-17.808 0-32.3 14.483-32.3 32.294 0 17.804 14.487 32.293 32.3 32.293 17.804 0 32.293-14.482 32.293-32.293s-14.489-32.294-32.293-32.294z"/><path d="m243.77 209.11c-17.804 0-32.294 14.483-32.294 32.294 0 17.804 14.49 32.293 32.294 32.293 17.811 0 32.294-14.482 32.294-32.293s-14.49-32.294-32.294-32.294z"/></svg></button>
<div class="menu-ddown" id="ddownMenu">
	<div class="rowddownApp">
		<div class="coldddownApp">
			<a class="cardddownApp" href="http://project.location/Pustaka">
				<img src="http://project.localhost/img/logo/pustakaM.png">
				<h5>Pustaka</h5>
			</a>
		</div>
	</div>
</div>`;thisDdown.id = 'ddown';head.appendChild(cStyle);cStyle.type = 'text/css';if(cStyle.styleSheet){cStyle.styleSheet.cssText=css;}else{cStyle.appendChild(document.createTextNode(css));}const ddown=document.getElementById('ddown'),btnDdown = document.getElementById('btn-ddown');btnDdown.addEventListener("focus", function() {ddown.classList.add('show-ddown')});btnDdown.addEventListener("blur",  function() {ddown.classList.remove('show-ddown')});
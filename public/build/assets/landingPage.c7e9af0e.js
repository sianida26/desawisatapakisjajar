const c=document.getElementById("sidebar-root"),s=document.getElementById("sidebar"),n=document.getElementById("menu-button"),t=document.querySelectorAll(".nav-item"),i=()=>{c!=null&&c.classList.contains("hidden")?(c==null||c.classList.remove("hidden"),c==null||c.classList.add("flex")):(c==null||c.classList.remove("flex"),c==null||c.classList.add("hidden"))};window.onload=()=>{n==null||n.addEventListener("click",i),s==null||s.addEventListener("click",d=>d.stopPropagation()),c==null||c.addEventListener("click",i),t.forEach(d=>d.addEventListener("click",i))};
<h2>Courses</h2>
<ul id="list"></ul>

<script>
fetch('/api/courses',{
    headers:{
        'Authorization':'Bearer '+localStorage.getItem('token')
    }
})
.then(res=>res.json())
.then(data=>{
    data.forEach(c=>{
        document.getElementById('list').innerHTML += `<li>${c.title}</li>`;
    })
});
</script>
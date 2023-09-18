<section class="py-5">
    <div class="container px-5 mb-5">
        <div id="content" class="text-center mb-5">
            <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Projects</span></h1>
        </div>
        <div class="row gx-5 justify-content-center">
            <div id="project-list" class="col-lg-11 col-xl-9 col-xxl-8 min-vh-100"></div>
        </div>
    </div>
</section>

<script>
    const loading = document.getElementById("loading-div");
    const content = document.getElementById('content');

    const getProjects = async function() {
        // Show Loading
        loading.classList.remove('d-none');
        content.classList.add('d-none');

        try {
            const URL = '/projectsData';
            const response = await axios.get(URL);
            const data = await response.data;

            // Hide Loading
            loading.classList.add('d-none');
            content.classList.remove('d-none');

            // Render Project cards
            renderProjectCards(data);
        } catch (error) {
            // Show Loading
            loading.classList.remove('d-none');
            content.classList.add('d-none');
            alert('Something Went wrong');
            console.error(error);
        }
    }();

    const renderProjectCards = (projects) => {
        const projectsListDiv = document.getElementById("project-list");
        projects.map(project => {
            const {
                id,
                title,
                details,
                previewLink,
                thumbnailLink
            } = project;

            projectsListDiv.innerHTML += `
            <div id=${id} class="card overflow-hidden shadow rounded-4 border-0 mb-5">
                <div class="card-body p-0">
                    <div class="d-flex align-items-center">
                      <div class="p-5">
                        <h2 class="fw-bolder">${title}</h2>
                        <p>${details}</p>
                        <a class ="text-decoration-none" target="_blank" href="${previewLink}">View Project</a>
                    </div>
                <img class="w-50" src='${thumbnailLink}' alt=${title} />
             </div>
        </div>
    </div>`
        })
    }
</script>

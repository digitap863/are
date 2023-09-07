document.addEventListener("DOMContentLoaded", function () {
  const onGoingButton = document.getElementById("onGoingButton");
  const completedButton = document.getElementById("completedButton");
  const projectContents = document.querySelector(".project-contents");

  onGoingButton.addEventListener("click", function () {
    filterProjects("ongoing");
  });

  completedButton.addEventListener("click", function () {
    filterProjects("completed");
  });

  function filterProjects(status) {
    const projects = projectContents.querySelectorAll(".singleProject");
    projects.forEach(function (project) {
      const projectStatus = project.dataset.status;
      if (projectStatus === status || !status) {
        project.style.display = "flex";
      } else {
        project.style.display = "none";
      }
    });
  }

  // Initial display: Show "OnGoing" projects by default
  filterProjects("ongoing");
});

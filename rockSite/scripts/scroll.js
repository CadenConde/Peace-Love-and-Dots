const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('img-smooth');
      }
    });
  });
  
  observer.observe(document.querySelector('.obs'));

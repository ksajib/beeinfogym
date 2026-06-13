   <section id="careers" class="section-pad" style="background: var(--black);">
       <div class="container px-0">
           <div id="search-bar">
               <div class="container px-0 d-flex align-items-center gap-3 flex-wrap">
                   <div class="search-field-wrap">
                       <i class="bi bi-search si"></i>
                       <input type="text" class="search-field" id="jobSearch"
                           placeholder="Search by job title, skill or keyword…" oninput="filterJobs()" />
                   </div>
                   <select class="search-select" id="deptFilter" onchange="filterJobs()">
                       <option value="">All Departments</option>
                       <option value="engineering">Engineering</option>
                       <option value="product">Product &amp; Design</option>
                       <option value="sales">Sales &amp; Marketing</option>
                       <option value="support">Customer Support</option>
                   </select>
                   <select class="search-select" id="typeFilter" onchange="filterJobs()">
                       <option value="">All Types</option>
                       <option value="full-time">Full Time</option>
                       <option value="part-time">Part Time</option>
                   </select>
                   <select class="search-select" id="levelFilter" onchange="filterJobs()">
                       <option value="">All Levels</option>
                       <option value="beginner">Beginner</option>
                       <option value="experienced">Experienced</option>
                   </select>
                   <button class="btn-search"><i class="bi bi-search me-2"></i>Search Jobs</button>
               </div>
           </div>
       </div>
   </section>

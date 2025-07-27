  @extends('Layouts.adminLayout')
  @section('content')
      <div class="cards-grid">
          <a href="{{route('adminStudents')}}" class="dashboard-card card student">
              <div class="card-icon icon-blue">🧑‍🎓</div>
              <div class="card-content">
                  <div class="card-title">Students</div>
                  <div class="card-description">View all the students</div>
              </div>
          </a>

          <a href="{{route('adminTeachers')}}" class="dashboard-card card student">
              <div class="card-icon icon-blue">👨‍🏫</div>
              <div class="card-content">
                  <div class="card-title">Teachers</div>
                  <div class="card-description">View all the teachers</div>
              </div>
          </a>

          <a href="{{route('adminBooks.index')}}" class="dashboard-card card student">
              <div class="card-icon icon-blue">📚</div>
              <div class="card-content">
                  <div class="card-title">Books</div>
                  <div class="card-description">View all the books</div>
              </div>
          </a>

           <a href="{{route('admin.logout')}}" class="dashboard-card card student">
              <div class="card-icon icon-indigo">⚙️</div>
              <div class="card-content">
                  <div class="card-title">Logout</div>
                  <div class="card-description">Logout your account</div>
              </div>
          </a>

      </div>
  @endsection

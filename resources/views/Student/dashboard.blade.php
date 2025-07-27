  @extends('Layouts.studentLayout')
  @section('content')
      <div class="cards-grid">
          <!-- Student Cards -->
          <a href="{{route('students.books')}}" class="dashboard-card card student">
              <div class="card-icon icon-blue">📚</div>
              <div class="card-content">
                  <div class="card-title">Books</div>
                  <div class="card-description">View all the available books</div>
              </div>
          </a>

          <a href="{{route('assignment.index')}}" class="dashboard-card card student">
              <div class="card-icon icon-green">📝</div>
              <div class="card-content">
                  <div class="card-title">Assignments</div>
                  <div class="card-description">Submit and track your assignments</div>
              </div>
          </a>

          <a href="{{route('student.degrees.show')}}" class="dashboard-card card student">
              <div class="card-icon icon-purple">📊</div>
              <div class="card-content">
                  <div class="card-title">Grades</div>
                  <div class="card-description">Check your grades and feedback</div>
              </div>
          </a>

          <a href="{{route('student.logout')}}" class="dashboard-card card student">
              <div class="card-icon icon-indigo">⚙️</div>
              <div class="card-content">
                  <div class="card-title">Logout</div>
                  <div class="card-description">Logout your account</div>
              </div>
          </a>
      </div>
  @endsection

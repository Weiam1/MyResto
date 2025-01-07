
<x-app-layout>
<div class="container text-center pt-5 pb-3">
    <h1 class="display-4 fw-bold text-dark-orange">{{$news->title}}</h1>
</div>




<!-- Post Section -->
<div class="container py-5">
   <!-- Post 1 -->
   <div class="post-item border-bottom pb-4 mb-4">
      <div class="row align-items-center">
         <!-- Image Section -->
         <div class="col-md-6 mb-4">
            <img class="img-fluid rounded" src="/images/{{$news->image}}" alt="Recipe Image">
         </div>

        
         <div class="col-md-6">
            <div class="text-box">
               <span class="text-light font-weight-bold pt-3">By: {{ $news->user->name }} | 
               {{ $news->updated_at ? $news->updated_at->format('d-m-Y') : 'No Date Available' }}</span>
           
               <p class="text-muted-light py-3">
                  {{$news->description}}
               </p>
            </div>
         </div>
      </div>
   </div>


        
</x-app-layout>
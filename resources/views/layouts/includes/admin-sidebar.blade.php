

<div class="sidebar pe-4 pb-3">

            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>FOODY</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{asset('/img/user.png')}}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Falasteen AlAstal</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{URL::to('/api/')}}" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="{{URL::to('/api/foody/categories')}}" class="nav-item nav-link "><i class="fas fa-fw fa-folder me-2"></i>Categories</a>
                   
                    <a href="{{URL::to('/api/foody/meals')}}" class="nav-item nav-link"><i class="fas fa-utensils me-2"></i>Food</a>
                    <a href="{{URL::to('/api/foody/products')}}" class="nav-item nav-link"><i class="fa fa-archive me-2"></i>Products</a>
                    
                    <!-- <a href="{{URL::to('/api/foody/diseases')}}" class="nav-item nav-link"><i class="fa fa-medkit me-2"></i>Diseases</a>
                    <a href="{{URL::to('/api/foody/forbidden')}}" class="nav-item nav-link"><i class="fas fa-utensils me-2"></i>Forbidden</a>
                    <a href="{{URL::to('/api/foody/alternatives')}}" class="nav-item nav-link"><i class="fas fa-utensils me-2"></i>Alternatives</a> -->

                    <div class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-medkit me-2"></i>Medical Cases</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{URL::to('/api/foody/diseases')}}" class="dropdown-item">Diseases</a>
                            <a href="{{URL::to('/api/foody/forbidden')}}" class="dropdown-item">Forbidden Foods</a>
                            <a href="{{URL::to('/api/foody/alternatives')}}" class="dropdown-item">Alternatives</a>
                        </div>
                    </div>

                    <a href="{{URL::to('/api/foody/challenges')}}" class="nav-item nav-link"><i class="fa fa-sign-language me-2"></i>Coupons</a>
                    <a href="{{URL::to('/api/foody/orders')}}" class="nav-item nav-link"><i class="fa fa-shopping-cart me-2"></i>Orders</a>
                    <a href="{{URL::to('/api/foody/messages')}}" class="nav-item nav-link"><i class="fa fa-envelope me-2"></i>Messages</a>
                    
                </div>
            </nav>
        </div>

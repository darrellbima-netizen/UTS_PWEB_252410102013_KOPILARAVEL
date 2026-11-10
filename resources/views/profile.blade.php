@extends('layouts.dashboard')

@section('title', 'Profile')

@section('content')

<div class="profile-container">

    <!-- PROFILE HEADER -->
    <div class="profile-header">

        <div>
            <p class="profile-label">ACCOUNT INFORMATION</p>

            <h1>My Profile</h1>

            <p>
                Manage your account information and
                coffee shop identity.
            </p>
        </div>

        <div class="profile-brand">
            ☕ NgopiDawg Coffee House
        </div>

    </div>


    <!-- PROFILE MAIN CARD -->
    <div class="profile-main-card">

    <div class="profile-cover">

        <img
            src="{{ asset('images/yoi.jpg') }}"
            alt="NgopiDawg Coffee Banner"
            class="profile-cover-image"
        >

        <div class="profile-cover-overlay"></div>

    </div>


        <div class="profile-identity">

            <div class="profile-avatar">
                {{ strtoupper(substr($profile['name'], 0, 1)) }}
            </div>

            <div class="profile-identity-info">

                <h2>{{ $profile['name'] }}</h2>

                <p>
                    @ {{ $profile['username'] }}
                </p>

                <span class="profile-role">
                    {{ $profile['role'] }}
                </span>

            </div>

        </div>


        <div class="profile-divider"></div>


        <!-- PERSONAL INFORMATION -->
        <div class="profile-information">

            <div class="profile-section-title">

                <h3>Personal Information</h3>

                <p>
                    Informasi dasar akun pengguna NgopiDawg.
                </p>

            </div>


            <div class="profile-information-grid">

                <div class="profile-info-item">

                    <span>Full Name</span>

                    <h4>{{ $profile['name'] }}</h4>

                </div>


                <div class="profile-info-item">

                    <span>Username</span>

                    <h4>{{ $profile['username'] }}</h4>

                </div>


                <div class="profile-info-item">

                    <span>Email Address</span>

                    <h4>{{ $profile['email'] }}</h4>

                </div>


                <div class="profile-info-item">

                    <span>Account Role</span>

                    <h4>{{ $profile['role'] }}</h4>

                </div>


                <div class="profile-info-item">

                    <span>Member Since</span>

                    <h4>{{ $profile['joined'] }}</h4>

                </div>


                <div class="profile-info-item">

                    <span>Coffee Shop</span>

                    <h4>{{ $profile['coffee_shop'] }}</h4>

                </div>

            </div>

        </div>


        <div class="profile-divider"></div>


        <!-- COFFEE SHOP INFORMATION -->
        <div class="profile-information">

            <div class="profile-section-title">

                <h3>About NgopiDawg</h3>

                <p>
                    Coffee shop information.
                </p>

            </div>


            <div class="profile-about">

                <div class="about-icon">
                    ☕
                </div>

                <div>

                    <h4>{{ $profile['coffee_shop'] }}</h4>

                    <p>
                        {{ $profile['description'] }}
                    </p>

                </div>

            </div>

        </div>


        <!-- PROFILE FOOTER -->
        <div class="profile-card-footer">

            <span>
                ☕ NgopiDawg Management System
            </span>

            <span>
                Member since {{ $profile['joined'] }}
            </span>

        </div>

    </div>

</div>

@endsection

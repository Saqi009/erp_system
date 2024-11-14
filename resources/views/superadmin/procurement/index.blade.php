@extends('superadminlayout.main')

@section('title', 'zingo- procurement')

@section('content')

    <head>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            }

            .dashboard {
                padding: 2rem;
                background-color: #f9fafb;
                min-height: 100vh;
            }

            .dashboard-title {
                font-size: 2rem;
                font-weight: bold;
                color: #1f2937;
                margin-bottom: 2rem;
            }

            .card-container {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
                gap: 1.5rem;
                max-width: 1200px;
                margin: 0 auto;
            }

            .card {
                background: white;
                border-radius: 8px;
                box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
                transition: all 0.3s ease;
                overflow: hidden;
                display: flex;
                flex-direction: column;
            }

            .card:hover {
                transform: translateY(-4px);
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            }

            .card.monthly {
                border-top: 4px solid #3b82f6;
            }

            .card.full {
                border-top: 4px solid #8b5cf6;
            }

            .card.laptop {
                border-top: 4px solid #10b981;
            }

            .card-header {
                padding: 1.5rem 1.5rem 1rem;
            }

            .card-header-top {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 1rem;
            }

            .icon {
                width: 48px;
                height: 48px;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: transform 0.3s ease;
            }

            .card:hover .icon {
                transform: scale(1.1);
            }

            .monthly .icon {
                color: #3b82f6;
            }

            .full .icon {
                color: #8b5cf6;
            }

            .laptop .icon {
                color: #10b981;
            }

            .badge {
                padding: 0.25rem 0.75rem;
                border-radius: 9999px;
                font-size: 0.875rem;
                font-weight: 500;
            }

            .monthly .badge {
                background-color: #eff6ff;
                color: #3b82f6;
            }

            .full .badge {
                background-color: #f5f3ff;
                color: #8b5cf6;
            }

            .laptop .badge {
                background-color: #ecfdf5;
                color: #10b981;
            }

            .card-title {
                font-size: 1.5rem;
                font-weight: bold;
                color: #1f2937;
                margin-bottom: 0.5rem;
            }

            .card-description {
                color: #6b7280;
                font-size: 0.875rem;
                line-height: 1.5;
            }

            .card-content {
                padding: 1rem 1.5rem 1.5rem;
                flex-grow: 1;
            }

            .feature-list {
                list-style: none;
                margin-bottom: 1.5rem;
            }

            .feature-item {
                display: flex;
                align-items: center;
                color: #6b7280;
                font-size: 0.875rem;
                margin-bottom: 0.5rem;
            }

            .feature-dot {
                width: 8px;
                height: 8px;
                border-radius: 50%;
                margin-right: 0.5rem;
            }

            .monthly .feature-dot {
                background-color: #3b82f6;
            }

            .full .feature-dot {
                background-color: #8b5cf6;
            }

            .laptop .feature-dot {
                background-color: #10b981;
            }

            /* Button Styles */
            .card-button {
                margin: 0 1.5rem 1.5rem;
                padding: 0.75rem 1.5rem;
                border-radius: 6px;
                font-weight: 500;
                text-align: center;
                transition: all 0.2s ease;
                border: none;
                cursor: pointer;
                font-size: 0.875rem;
                text-transform: uppercase;
                letter-spacing: 0.025em;
            }

            .monthly .card-button {
                background-color: #3b82f6;
                color: white;
            }

            .monthly .card-button:hover {
                background-color: #2563eb;
            }

            .full .card-button {
                background-color: #8b5cf6;
                color: white;
            }

            .full .card-button:hover {
                background-color: #7c3aed;
            }

            .laptop .card-button {
                background-color: #10b981;
                color: white;
            }

            .laptop .card-button:hover {
                background-color: #059669;
            }

            /* SVG Icons */
            .icon svg {
                width: 24px;
                height: 24px;
            }
        </style>
    </head>

    <body>
        <div class="dashboard">
            <h1 class="dashboard-title">Procurement Dashboard</h1>

            <div class="card-container">
                <!-- Monthly Procurement Card -->
                <div class="card monthly">
                    <div class="card-header">
                        <div class="card-header-top">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <span class="badge">Monthly</span>
                        </div>
                        <h2 class="card-title">Monthly Procurement</h2>
                        <p class="card-description">Manage your monthly procurement requests and track their status</p>
                    </div>
                    <div class="card-content">
                        <ul class="feature-list">
                            <li class="feature-item">
                                <span class="feature-dot"></span>
                                Track monthly expenses
                            </li>
                            <li class="feature-item">
                                <span class="feature-dot"></span>
                                Generate reports
                            </li>
                        </ul>
                    </div>
                    <a href="{{ route('superadmin.procurement.monthly_procurement') }}" style="text-decoration: none" class="card-button">Monthly Procurement</a>
                </div>

                <!-- Full Procurement Card -->
                <div class="card full">
                    <div class="card-header">
                        <div class="card-header-top">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                </svg>
                            </div>
                            <span class="badge">Full</span>
                        </div>
                        <h2 class="card-title">Full Procurement</h2>
                        <p class="card-description">Complete procurement management system for all your needs</p>
                    </div>
                    <div class="card-content">
                        <ul class="feature-list">
                            <li class="feature-item">
                                <span class="feature-dot"></span>
                                Comprehensive tracking
                            </li>
                            <li class="feature-item">
                                <span class="feature-dot"></span>
                                Advanced analytics
                            </li>
                        </ul>
                    </div>
                    <a href="{{ route('superadmin.procurement.full_procurement') }}" style="text-decoration: none" class="card-button">Full Procurement</a>
                </div>

                <!-- Laptop Assignment Card -->
                <div class="card laptop">
                    <div class="card-header">
                        <div class="card-header-top">
                            <div class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                </svg>
                            </div>
                            <span class="badge">Equipment</span>
                        </div>
                        <h2 class="card-title">Assign Laptop</h2>
                        <p class="card-description">Manage and track laptop assignments across your organization</p>
                    </div>
                    <div class="card-content">
                        <ul class="feature-list">
                            <li class="feature-item">
                                <span class="feature-dot"></span>
                                Equipment tracking
                            </li>
                            <li class="feature-item">
                                <span class="feature-dot"></span>
                                Assignment history
                            </li>
                        </ul>
                    </div>
                    <a href="{{ route('superadmin.procurement.assign_laptop_procurement') }}" style="text-decoration: none" class="card-button">Full Procurement</a>
                </div>
            </div>
        </div>

    @endsection

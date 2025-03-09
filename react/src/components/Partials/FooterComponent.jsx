export default function Footer() {
    return (
        <footer className="footer text-white py-3 mt-auto">
            <div className="container d-flex flex-column flex-md-row align-items-center justify-content-between">
                {/* Copyright Text */}
                <div className="text-center text-md-start">
                    <a href="#" className="text-muted text-decoration-none">
                        © {new Date().getFullYear()} Core Experts Consulting. All Rights Reserved.
                    </a>
                </div>
            </div>
        </footer>
    );
}

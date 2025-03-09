import { Link, useLocation } from "react-router-dom";
import logo from "../../assets/images/logo.png";

export default function Header() {
    const location = useLocation();

    return (
        <header id="kt_header" className="header align-items-stretch">
            {/* Container */}
            <div className="container-fluid d-flex align-items-stretch justify-content-between">
                {/* Logo */}
                <div className="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                    <Link to="/dashboard" className="">
                        <img alt="Logo" src={logo} className="h-100px" />
                    </Link>
                </div>

                {/* Navbar Wrapper */}
                <div className="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
                    {/* Navbar */}
                    <div className="d-flex align-items-stretch" id="kt_header_nav">
                        {/* Menu Wrapper */}
                        <div
                            className="header-menu align-items-stretch"
                            data-kt-drawer="true"
                            data-kt-drawer-name="header-menu"
                            data-kt-drawer-activate='{default: true, lg: false}'
                            data-kt-drawer-overlay="true"
                            data-kt-drawer-width='{default:"200px", "300px": "250px"}'
                            data-kt-drawer-direction="end"
                            data-kt-drawer-toggle="#kt_header_menu_mobile_toggle"
                            data-kt-swapper="true"
                            data-kt-swapper-mode="prepend"
                            data-kt-swapper-parent='{default: "#kt_body", lg: "#kt_header_nav"}'
                        >
                            {/* Menu */}
                            <div
                                className="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700
                                menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400
                                fw-bold my-5 my-lg-0 align-items-stretch"
                                id="#kt_header_menu"
                                data-kt-menu="true"
                            >
                                {/* Home Link */}
                                <div className="menu-item me-lg-1">
                                    <Link
                                        className={`menu-link py-3 ${location.pathname === "/" ? "active" : ""}`}
                                        to="/dashboard"
                                    >
                                        <span className="menu-title">Home</span>
                                    </Link>
                                </div>
                                <div className="menu-item me-lg-1">
                                    <Link
                                        className={`menu-link py-3 ${location.pathname === "/" ? "active" : ""}`}
                                        to="/users"
                                    >
                                        <span className="menu-title">Users</span>
                                    </Link>
                                </div>
                            </div>
                            {/* End Menu */}
                        </div>
                        {/* End Menu Wrapper */}
                    </div>
                    {/* End Navbar */}
                </div>
                {/* End Navbar Wrapper */}
            </div>
            {/* End Container */}
        </header>
    );
}

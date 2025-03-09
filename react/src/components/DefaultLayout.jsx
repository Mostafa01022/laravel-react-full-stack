import {Navigate, Outlet} from "react-router-dom";
import {useStateContext} from "../contexts/ContextProvider.jsx";
import HeadComponent from "./Partials/HeadComponent.jsx";
import Footer from "./Partials/FooterComponent.jsx";
import Toolbar from "./Partials/ToolBarComponent.jsx";
import NavBar from "./Partials/NavBar.jsx";
import {useTitle} from "./PageTitle.jsx";

export default function DefaultLayout() {
    const {user, token} = useStateContext();
    const { title } = useTitle();
    if (!token) {
        return <Navigate to="/"/>;
    }

    return (
        <>
            {/* Head Component */}
            <HeadComponent/>

            {/* Page Wrapper */}
            <div className="d-flex flex-column min-vh-100">

                {/* Navbar */}
                <NavBar/>

                <Toolbar toolBarTitle={title}/>
                {/* Main Content Wrapper */}
                <div className="container-fluid flex-grow-1">
                    {/* Toolbar */}

                    {/* Page Content */}
                    <div className="col-lg-10 col-md-12">
                        <Outlet/>
                    </div>
                </div>

                {/* Footer */}
                <Footer/>
            </div>
        </>
    );
}

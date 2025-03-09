import { useEffect } from "react";
import {useTitle} from "../components/PageTitle.jsx";

export default function Users() {
    const { setTitle } = useTitle(); // Get the setTitle function

    useEffect(() => {
        setTitle("Users Management"); // Update the toolbar title
        document.title = "Users Management | My Web App"; // Update browser title
    }, []);

    return (
        <>
            {/* Main Content */}
            <div className="container-fluid py-4 bg-light min-vh-100">
                <div className="row justify-content-center">
                    <div className="col-lg-10 col-md-12">
                        <div className="bg-white shadow-sm rounded p-4">
                            <h2>Users Management</h2>
                            <p>Manage your application users here.</p>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}

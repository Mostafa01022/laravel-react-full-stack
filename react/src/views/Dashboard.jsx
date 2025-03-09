import {useEffect} from "react";
import {useTitle} from "../components/PageTitle.jsx";

export default function Dashboard() {
    const { setTitle } = useTitle();

    useEffect(() => {
        setTitle("Dashboard");
        document.title = "Dashboard";
    }, []);

    return (
        <>
            {/* Main Content */}
            <div className="container-fluid py-4">
                <div className="row justify-content-center">
                    <div className="col-lg-10 col-md-12">
                        <div className="bg-white shadow-sm rounded p-4">
                            <h2>Welcome to the Dashboard</h2>
                            <p>This is the main dashboard area.</p>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}

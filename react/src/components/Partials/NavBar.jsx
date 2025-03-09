import {Link} from "react-router-dom";

export default function NavBar(){
    return(
        <nav className="navbar navbar-expand-lg  bg-white">
            <div className="container-fluid">
                <div className="collapse navbar-collapse" id="navbarNav">
                    <ul className="navbar-nav">
                        <li className="nav-item">
                            <Link to={'/dashboard'} className="nav-link active" aria-current="page" href="#">Home</Link>
                        </li>
                        <li className="nav-item">
                            <Link to={'/users'} className="nav-link" href="#">users</Link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    )
}

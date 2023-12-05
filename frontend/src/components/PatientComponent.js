import React, { useEffect, useState } from "react";
import axios from "axios";

const PatientComponent = () => {
  const [medicalHistory, setMedicalHistory] = useState({});
  const [upcomingAppointments, setUpcomingAppointments] = useState([]);
  const [doctors, setDoctors] = useState([]);
  const [selectedDoctor, setSelectedDoctor] = useState("");
  const [selectedDate, setSelectedDate] = useState("");

  useEffect(() => {
    // Implement JWT authentication
    const token = localStorage.getItem("jwt"); // Assuming you store the JWT in localStorage

    // Fetch medical history
    axios
      .get("http://localhost/api/patient/medical-history", {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      })
      .then((response) => {
        setMedicalHistory(response.data);
      })
      .catch((error) => {
        console.error(error);
      });

    // Fetch upcoming appointments
    axios
      .get("http://localhost/api/patient/upcoming-appointments", {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      })
      .then((response) => {
        setUpcomingAppointments(response.data);
      })
      .catch((error) => {
        console.error(error);
      });

    // Fetch available doctors
    axios
      .get("http://localhost/api/patient/available-doctors", {
        headers: {
          Authorization: `Bearer ${token}`,
        },
      })
      .then((response) => {
        setDoctors(response.data);
      })
      .catch((error) => {
        console.error(error);
      });
  }, []);

  const handleAppointmentBooking = () => {
    // Implement JWT authentication
    const token = localStorage.getItem("jwt"); // Assuming you store the JWT in localStorage

    // Book an appointment
    axios
      .post(
        "http://localhost/api/patient/book-appointment",
        {
          doctorId: selectedDoctor,
          date: selectedDate,
        },
        {
          headers: {
            Authorization: `Bearer ${token}`,
          },
        }
      )
      .then((response) => {
        // Handle successful booking
        console.log("Appointment booked successfully");
      })
      .catch((error) => {
        console.error(error);
      });
  };

  return (
    <div>
      <h1>Patient Dashboard</h1>

      <div>
        <h2>Medical History</h2>
        {/* Display medical history data */}
        <pre>{JSON.stringify(medicalHistory, null, 2)}</pre>
      </div>

      <div>
        <h2>Upcoming Appointments</h2>
        {/* Display upcoming appointments data */}
        <pre>{JSON.stringify(upcomingAppointments, null, 2)}</pre>
      </div>

      <div>
        <h2>Book Appointment</h2>
        <label>
          Select Doctor:
          <select onChange={(e) => setSelectedDoctor(e.target.value)}>
            <option value="" disabled selected>
              Select a doctor
            </option>
            {doctors.map((doctor) => (
              <option key={doctor.id} value={doctor.id}>
                {doctor.name}
              </option>
            ))}
          </select>
        </label>
        <label>
          Select Date:
          <input
            type="datetime-local"
            onChange={(e) => setSelectedDate(e.target.value)}
          />
        </label>
        <button onClick={handleAppointmentBooking}>Book Appointment</button>
      </div>
    </div>
  );
};

export default PatientComponent;
